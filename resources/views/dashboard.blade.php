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
                <li class="nav-item"> <a href="" class="nav-link active" aria-current="page"> <i class="fa fa-home"></i><span class="ms-2">Home</span> </a> </li>
                <li> <a href="{{route('tasks.index')}}" class="nav-link text-white"> <i class="fa fa-dashboard"></i><span class="ms-2">Users</span> </a> </li>
                <li> <a href="{{route('tasks.index')}}" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Tasks</span> </a> </li>
                {{-- <li> <a href="#" class="nav-link text-white"> <i class="fa fa-cog"></i><span class="ms-2">Settings</span> </a> </li>
                <li> <a href="#" class="nav-link text-white"> <i class="fa fa-bookmark"></i><span class="ms-2">Bookmarks</span> </a> </li> --}}
            </ul>
            {{-- <hr>
            <div class="dropdown"> <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false"> <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2"> <strong> John W </strong> </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div> --}}
        </div>
        <div  class="d-flex flex-column vh-100 flex-expand">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">USER #1</h5>
                <h3 class="card-title">Joe Smith</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">See Tasks</a>
                </div>
            </div>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">USER #2</h5>
                    <h3 class="card-title">Jhon Smith</h3>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">See Tasks</a>
                </div>
            </div>
            
        </div>
    </body>
</html>