<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <!--<link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{URL::to('css/signin.css')}}" rel="stylesheet">
    <style>
        #newRegister {
            text-align: center;
            vertical-align: middle;

            height: 35px;
        }

        #loginLabel {
            text-align: center;
        }

        #modalBody {
            margin-top: 20px;
            width: 88%;
            padding-left: 12%;
            margin-bottom: 20px;
        }

        #createAccount-btn {
            margin-right: 33%;
        }

    </style>
</head>

<body>

    <div class="container">

        <form class="form-signin" action="{{route('login')}}" method="post">
            @if(isset($return))
                @if($return=="Invalid Credentials!")
            <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong> {{$return}}
            </div>
                @elseif ($return=="Another Admin logged in!")
                    <div class="alert alert-danger" role="alert">
                        <strong>Oh snap!</strong> {{$return}}
                    </div>
                @else
                <div class="alert alert-success" role="alert">
                    <strong>Registered!</strong> {{$return}}
                </div>
                @endif
            @endif
            <h4 id="loginLabel" class="form-signin-heading">Please Identify Yourself</h4>

            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

            <div class="checkbox">
                <label>
                <input type="checkbox" name="asAdmin"> Login as Admin
            </label>
            </div>

            {{csrf_field()}}

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
        <div class="form-signin">
                <button class="btn btn-secondary btn-block" type="button" id="newRegister" data-toggle="modal" data-target="#myModal">
                    New User? Register Here!
                </button>
        </div>

                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Create Account</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form class="form-register" action="{{route('registerUser')}}" method="post">
                            <!-- Modal body -->
                            <div id="modalBody">
                            <label for="inputEmail" class="sr-only">Email address</label>
                            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

                            <label for="inputPassword" class="sr-only">Password</label>
                            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

                            <label for="inputFirstName" class="sr-only">First Name</label>
                            <input name="firstName" type="text" id="inputFirstName" class="form-control" placeholder="First Name" required>

                            <label for="inputLastName" class="sr-only">Last Name</label>
                            <input name="lastName" type="text" id="inputLastName" class="form-control" placeholder="Last Name" required>

                            <label for="inputAddressLineOne" class="sr-only">Address Line One</label>
                            <input name="addressLineOne" type="text" id="inputAddressLineOne" class="form-control" placeholder="Address Line One" required>

                            <label for="inputAddressLineTwo" class="sr-only">Address Line Two</label>
                            <input name="addressLineTwo" type="text" id="inputAddressLineTwo" class="form-control" placeholder="Address Line Two (Optional)">

                            <label for="inputTelephone" class="sr-only">Telephone</label>
                            <input name="telephone" type="text" id="inputTelephone" class="form-control" placeholder="Telephone number" required>
                            </div>
                            {{ csrf_field() }}
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button id="createAccount-btn" type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>




    </div>
    <!-- /container -->


    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    {{--
    <script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>

</html>
