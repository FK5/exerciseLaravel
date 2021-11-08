<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class DashboardController extends Controller
{
    public function userTasks($id)
    {
        $tasks = Task::all()->where('user_id',$id);
        return view('userTasks.index',compact('tasks','id'));
    }

    public function createUserTasks($id)
    {
        return view('userTasks.create',compact('id'));
    }

    public function store(Request $request)
    {
        $task = new Task();
        if(!$request->has('status'))$status=false;else$status=true;

        $task->title = $request->title;
        $task->description =$request->description;
        $task->status = $status;
        $task->user_id =  $request->user_id;
        $task->save();
        return redirect()->route('userTasks.index',$request->user_id);

    }

    // public function show(Task $task)
    // {

    // }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('userTasks.edit', compact('task'));
    }

    public function update(Request $request)
    {

        $task = Task::findOrFail($request->id);

        if(!$request->has('status'))$status=false;else$status=true;
        $task->title = $request->title;
        $task->description =$request->description;
        $task->status = $status;
        $task->user_id = $request->user_id;
        $task->save();
        return redirect()->route('userTasks.index',$request->user_id);

    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        return view('userTasks.delete', compact('task'));
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $userID =  $task->user_id;
        $task->delete();
        return redirect()->route('userTasks.index',$userID);
    }
}
