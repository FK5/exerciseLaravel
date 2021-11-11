@extends('layouts.admin')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{route('tasks.create')}}" class="btn btn-primary">Create Task</a>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Tasks</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                   @foreach ($tasks as $task)
                       <tr>
                           <td>{{ $task->id }}</td>
                           <td>{{ $task->title }}</td>
                           <td>{{ $task->description }}</td>
                           <td>
                                @if ($task->status)
                                Completed
                                @else
                                    Not Completed
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Delete</a>
                                {{-- <form action="{{ route('tasks.delete', $task->id) }}" method="GET" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                <form> --}}
                            </td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{--                         --}}
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">User has {{$countSubtasks}} SubTasks</h6>
    </div>
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All SubTasks</h6>
    </div>
    <div class="card-body" id="subtask">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subtask</th>
                        <th>Task ID</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Subtask</th>
                        <th>Task ID</th>
                    </tr>
                </tfoot>
                <tbody>
                   @foreach (Auth::user()->subtasks as $subtask)
                       <tr>
                           <td>{{ $subtask->id }}</td>
                           <td>{{ $subtask->subtask }}</td>
                           <td>{{ $subtask->task_id }}</td>
                            {{-- <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                <form>
                            </td> --}}
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection