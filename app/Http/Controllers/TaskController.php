<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all()->where('user_id', auth()->user()->id);
        // return $tasks;
        return view('tasks.index',compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $task = new Task();
        if(!$request->has('status'))$status=false;else$status=true;

        $task->title = $request->title;
        $task->description =$request->description;
        $task->status = $status;
        $task->user_id = auth()->user()->id;
        $task->save();
       
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task'=>$task]);
    }

    public function update(Request $request, Task $task)
    {
        $task->title = $request->title;
        $task->description =$request->description;
        if(!$request->has('status'))$task->status=false;else$task->status=true;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
