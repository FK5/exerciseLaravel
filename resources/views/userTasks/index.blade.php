<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </head>
    <body class="d-flex">
        <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;"> <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"> <svg class="bi me-2" width="40" height="32"> </svg> <span class="fs-4">Laravel Exercise</span> </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item"> <a href="#" class="nav-link text-white" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> </li>
                <li> <a href="#" class="nav-link text-white"> <i class="fa fa-dashboard"></i><span class="ms-2">Users</span> </a> </li>
                <li> <a href="#" class="nav-link active"> <i class="fa fa-first-order"></i><span class="ms-2">Tasks</span> </a> </li>
            </ul>
        </div>
        <div  class="d-flex flex-column vh-100 flex-expand">
            @foreach ($tasks as $task)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$task->title}}</h5>
                    <h3 class="card-title">{{$task->description}}</h3>
                    @if ($task->status == 1)
                        <p class="card-text">Task completed.</p>
                    @else
                        <p class="card-text">Task not completed.</p>
                    @endif
                </div>
                <a href="{{route('userTasks.edit',$task->id)}}" class="btn btn-primary">Edit Task</a>
                <a href="{{route('userTasks.delete',$task->id)}}" class="btn btn-primary">Delete Task</a>
                {{-- <form method="POST" action="{{route('userTasks.destroy',$task->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Delete Task</button>
                </form> --}}
            </div>
            @endforeach
            <a href="{{route('userTasks.create',$id)}}" class="btn btn-primary mt-5">Create Tasks</a>
        </div>

          
    </body>
</html>