
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
         @if($_SESSION['user_type'] == 'admin')
            <a class="nav-link" href="{{route('welcome')}}">Home </a>
         @else
            <a class="nav-link" href="{{route('welcomeUser')}}">Home </a>
          @endif
      </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                View Inventory
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('viewInventoryDesktop',['type'=>1,'st'=>'default'])}}">View Desktop</a>
                <a class="dropdown-item" href="{{route('viewInventoryMonitor',['type'=>2,'st'=>'default'])}}">View monitor</a>
                <a class="dropdown-item" href="{{route('viewInventoryLaptop',['type'=>3,'st'=>'default'])}}">View Laptop</a>
                <a class="dropdown-item" href="{{route('viewInventoryTablet',['type'=>4,'st'=>'default'])}}">View Tablet</a>
            </div>
        </li>
        @if($_SESSION['user_type'] == 'admin')
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Modify Inventory
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('modifyInventoryDesktop',['type'=>1])}}">Modify Desktop</a>
                <a class="dropdown-item" href="{{route('modifyInventoryMonitor',['type'=>2])}}">Modify monitor</a>
                <a class="dropdown-item" href="{{route('modifyInventoryLaptop',['type'=>3])}}">Modify Laptop</a>
                <a class="dropdown-item" href="{{route('modifyInventoryTablet',['type'=>4])}}">Modify Tablet</a>
            </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add inventory
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('addinventoryDesktop')}}">Add Desktop</a>
          <a class="dropdown-item" href="{{route('addinventorymonitor')}}">Add monitor</a>
          <a class="dropdown-item" href="{{route('addinventoryLaptop')}}">Add Laptop</a>
          <a class="dropdown-item" href="{{route('addinventoryTablet')}}">Add Tablet</a>
        </div>
      </li>
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Delete Inventory
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('deleteInventoryDesktop',['type'=>1])}}">Delete Desktop</a>
                <a class="dropdown-item" href="{{route('deleteInventoryMonitor',['type'=>2])}}">Delete monitor</a>
                <a class="dropdown-item" href="{{route('deleteInventoryLaptop',['type'=>3])}}">Delete Laptop</a>
                <a class="dropdown-item" href="{{route('deleteInventoryTablet',['type'=>4])}}">Delete Tablet</a>
            </div>
        </li>
            @endif
    </ul>

    {{--<span class="navbar-text">--}}
        {{--<ul class="navbar-nav mr-auto">--}}
        {{--<li class="nav-item dropdown">--}}
        {{--<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
          {{--{{$_SESSION['email']}}--}}
        {{--</a>--}}
        {{--<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
          {{--<a class="dropdown-item" href="{{route('logOut')}}">Sign Out</a>--}}
        {{--</div>--}}
      {{--</li>--}}
        {{--</ul>--}}
  {{--</span>--}}


      <span class="navbar-text">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Commit
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('commit')}}">Commit</a>
            <a class="dropdown-item" href="#">Discard</a>
        </div>
      </li>
        </ul>
  </span>

  </div>
</nav>
        @yield('content')
        
    </body>
</html>
