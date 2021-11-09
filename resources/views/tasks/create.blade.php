@extends('layouts.admin')

@section('content')

  {{--  route('tasks.update', $task->id) --}}
  <form method="POST"  action="{{route('tasks.store')}}">
    @csrf
    @method('POST')
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title"  aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="status" name="status" >
        <label class="form-check-label" for="status">Complete</label>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection