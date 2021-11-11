<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\SubTask;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function index()
    {
        $countSubtasks = auth()->user()->subtasks()->count();
        // var_dump($countSubtasks);
        $tasks = Task::all()->where('user_id', auth()->user()->id);
        return view('tasks.index',compact('tasks'))->with('countSubtasks',$countSubtasks);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            // 'title' => 'required|max:255|unique:tasks',
            'title' => ['required', 'max:255',Rule::unique('tasks')->where(function ($query) use ($request) {
                return $query->where('user_id', auth()->user()->id);
            })],
            'description' => ['required','max:255'],
        ]);


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
        
        $this->validate($request, [
            'title' => 'max:255|unique:tasks,title,'.$task->id,
            'description' => 'max:255',
        ]);

        $task->title = $request->title;
        $task->description =$request->description;
        if(!$request->has('status'))$task->status=false;else$task->status=true;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function delete(Task $task)
    {
        return view('tasks.delete', ['task'=>$task]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
