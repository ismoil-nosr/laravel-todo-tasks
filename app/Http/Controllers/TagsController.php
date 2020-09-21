<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $tasks = $tag->tasks()->with('tags')->where('author_id', auth()->id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }
}
