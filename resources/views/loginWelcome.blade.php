
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/e8269f311d.js"></script>
    <style>

        #manageInventory {

            position: relative;
            width: 300px;
            height: 300px;
            border-radius: 20px;
            left: 40%;
            top: 150px;
        }


        #signout-btn {
            position: relative;
            float: left;
            left: 85%;
        }

    </style>

</head>
<body>
<!-- page content -->
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul id="signout-btn" class="navbar-nav">
            <li  class="nav-item dropdown">
                <a  class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$_SESSION['email']}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('logOut')}}">Sign Out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<a href="{{route('welcome')}}">
<button type="button" id="manageInventory"
        {{--data-toggle="modal" data-target="#myModal"--}}
        class="btn btn-primary" href="{{route('welcome')}}">


    <i class="fa fa-cogs fa-5x" aria-hidden="true"></i>
    Manage Inventory
</button>
</a>

</body>


</html>



