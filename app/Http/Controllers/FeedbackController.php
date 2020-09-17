<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('admin.feedbacks', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required',
            'message' => 'required'
        ]);
        
        Feedback::create($attributes);
        return redirect()->back()->with('success', true);
    }
}