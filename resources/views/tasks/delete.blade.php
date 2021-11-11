@extends('layouts.admin')

@section('content')

    <h3>Do you really want to delete it</h3>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Cancel</a>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    <form>

  {{--  route('tasks.update', $task->id) --}}
  

@endsection