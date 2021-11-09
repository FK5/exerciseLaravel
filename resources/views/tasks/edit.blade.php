@extends('layouts.admin')

@section('content')
  {{--  route('tasks.update', $task->id) --}}
  <form method="POST"  action="{{route('tasks.update', $task->id)}}">
    @csrf
    @method('PUT')
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{$task->title}}"  aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{$task->description}}</textarea>
      </div>
      <div class="mb-3 form-check">
        @if ($task->status)
        <input type="checkbox" class="form-check-input" id="status" name="status" checked >
        @else
        <input type="checkbox" class="form-check-input" id="status" name="status">
        @endif
        <label class="form-check-label" for="status">Completed</label>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection