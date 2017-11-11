
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

            width: 300px;
            height: 300px;
            border-radius: 10px;
            margin-left: 40%;
            margin-top: 150px;
        }

        #viewInventory {


        }

    </style>

</head>
<body>
<!-- page content -->


<a type="submit" id="manageInventory"
        {{--data-toggle="modal" data-target="#myModal"--}}
        class="btn btn-default" href="{{route('welcome')}}"><i class="fa fa-cogs fa-5x" aria-hidden="true"></i>

    Manage Inventory
</a>

<span class="navbar-text">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{$_SESSION['email']}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('logOut')}}">Sign Out</a>
        </div>
      </li>
        </ul>
  </span>





</body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Manage Inventory</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <button type="button" id="viewInventory" class="btn btn-default"><i class="fa fa-eye fa-3x" aria-hidden="true"></i></button>
                <button type="button" id="modifyInventory" class="btn btn-default"><i class="fa fa-pencil fa-3x" aria-hidden="true"></i></button>
                <button type="button" id="addInventory" class="btn btn-default"><i class="fa fa-plus fa-3x" aria-hidden="true"></i></button>
                <button type="button" id="deleteInventory" class="btn btn-default"><i class="fa fa-trash fa-3x" aria-hidden="true"></i></button>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


</html>



