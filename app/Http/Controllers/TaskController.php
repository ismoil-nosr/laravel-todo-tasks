<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['can:update,task'])->except(['index', 'store', 'create']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = auth()->user()->tasks()->with('tags')->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);
        
        $attributes['author_id'] = auth()->id();
        $task = Task::create($attributes);

        /*  upd tags for task */
        $taskTags = $task->tags->keyBy('name'); // get current task tags
        
        $tagsInput= explode(',', request('tags')); // get tags from input
        $tagsCollection = collect(array_map('trim', $tagsInput)); //make collection from array (also trim spaces of arrays' value)
        $tags = $tagsCollection->keyBy(function ($item) { return $item; }); // prepare tags for sync array
        $syncIds = $taskTags->intersectByKeys($tags)->pluck('id')->toArray(); // get ids of tags in array

        $tagsToAttach = $tags->diffKeys($taskTags);  // get tags which was not added to task
        
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]); //get first found tag object or create if not exists
            $syncIds[] = $tag->id; // add to array for sync
        }

        $task->tags()->sync($syncIds); // sync method detaches and attaches tags from task

        return redirect('tasks/' . $task->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        // $this->authorize('update', $task);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $attributes = $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        
        $task->update($attributes);

        /*  upd tags for task */
        $taskTags = $task->tags->keyBy('name'); // get current task tags
        
        $tagsInput= explode(',', request('tags')); // get tags from input
        $tagsCollection = collect(array_map('trim', $tagsInput)); //make collection from array (also trim spaces of arrays' value)
        $tags = $tagsCollection->keyBy(function ($item) { return $item; }); // prepare tags for sync array
        $syncIds = $taskTags->intersectByKeys($tags)->pluck('id')->toArray(); // get ids of tags in array

        $tagsToAttach = $tags->diffKeys($taskTags);  // get tags which was not added to task
        
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]); //get first found tag object or create if not exists
            $syncIds[] = $tag->id; // add to array for sync
        }

        $task->tags()->sync($syncIds); // sync method detaches and attaches tags from task
        
        return redirect('/tasks/'. $task->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
