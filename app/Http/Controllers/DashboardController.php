<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class DashboardController extends Controller
{
    public function userTasks($id)
    {
        $tasks = User::findOrFail($id)->tasks;
        return view('userTasks.index',compact('tasks','id'));
    }

    public function createUserTasks($id)
    {
        return view('userTasks.create',compact('id'));
    }

    public function store(Request $request, $userID)
    {
        $task = new Task();
        if(!$request->has('status'))$status=false;else$status=true;

        $task->title = $request->title;
        $task->description =$request->description;
        $task->status = $status;
        $task->user_id =  $userID;
        $task->save();
       
        return redirect()->route('userTasks.index',$userID);

    }

    // public function show(Task $task)
    // {

    // }

    public function edit($id, $userID)
    {
        $task = Task::findOrFail($id);
        $user = $userID;
        return view('userTasks.edit', compact('task','user'));
    }

    public function update(Request $request, $userID)
    {
        $task = Task::findOrFail($request->id);

        if(!$request->has('status'))$status=false;else$status=true;
        $task->title = $request->title;
        $task->description =$request->description;
        $task->status = $status;
        $task->user_id =  $userID;
        $task->save();
        return redirect()->route('userTasks.index',$task->user_id);

    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $userID =  $task->user_id;
        $task->delete();
        return redirect()->route('userTasks.index',$userID);
    }
}
