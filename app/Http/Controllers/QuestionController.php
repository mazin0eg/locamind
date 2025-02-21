<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the questions.
     */
    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(10);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new question.
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created question in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Question::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified question.
     */
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified question.
     */
    public function edit(Question $question)
    {
        if (Auth::id() !== $question->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified question in storage.
     */
    public function update(Request $request, Question $question)
    {
        if (Auth::id() !== $question->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $question->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }

    /**
     * Remove the specified question from storage.
     */
    public function destroy(Question $question)
    {
        if (Auth::id() !== $question->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }
}
