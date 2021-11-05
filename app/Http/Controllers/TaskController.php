<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); // filter
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
        $task->save();
       
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {
        echo "ttt";
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if(!$request->has('status'))$status=false;else$status=true;
        $task->title = $request->title;
        $task->description =$request->description;
        $task->status = $status;
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