
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
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{URL::to('css/signin.css')}}" rel="stylesheet">

</head>

<body>

<div class="container">


    <form class="form-signin" action="{{route('login')}}" method="post">
        @if(isset($return))
            <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong>
                {{$return}}
            </div>
        @endif
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        {{csrf_field()}}
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
{{--<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>--}}
<script src="js/jquery-3.2.1.slim.min.js" ></script>
<script src="js/tether.min.js" ></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
