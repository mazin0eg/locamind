<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $questions = Question::with(['user', 'comments.user'])->latest()->get();
        return view('dashboard', compact('questions'));
    }
}
