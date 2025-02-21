<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request, Question $question)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'question_id' => $question->id,
            'body' => $request->body,
        ]);

        return redirect()->route('questions.show', $question)->with('success', 'Comment added successfully.');
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
