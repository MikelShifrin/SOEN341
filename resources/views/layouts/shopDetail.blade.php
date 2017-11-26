<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EShop - Welcome!</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="{{URL::to('css/animate.css')}}" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="{{URL::to('css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="{{URL::to('css/custom.css')}}" rel="stylesheet">

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
</head>

<body>


<div id="all">
    <header>

        <!-- *** TOP ***
_________________________________________________________ -->


        <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

            <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                <div class="container">
                    <div class="navbar-header">

                        <a class="navbar-brand home" href="index.html">
                            {{--<img src="img/logo.png" alt="Universal logo" class="hidden-xs hidden-sm">--}}
                            <img src="img/logo-small.png" alt="Universal logo" class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>
                        </a>
                        <div class="navbar-buttons">
                            <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                <span class="sr-only">Toggle navigation</span>
                                <i class="fa fa-align-justify"></i>
                            </button>
                        </div>
                    </div>
                    <!--/.navbar-header -->

                    <div class="navbar-collapse collapse" id="navigation">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item active">
                                <a href="{{route('welcomeUser')}}">Home<b class="caret"></b></a>
                            </li>

                            <li class="dropdown">
                                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">My WishList<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('viewWishList')}}">WishList</a>
                                    </li>
                                </ul>
                            </li>

                        {{----}}
                        <!-- ========== FULL WIDTH MEGAMENU END ================== -->

                            <li class="dropdown">
                                <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">{{$_SESSION['email']}}<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('logOut')}}">Sign Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div>
                    <!--/.nav-collapse -->



                    <div class="collapse clearfix" id="search">

                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>
                                    {{csrf_field()}}
                </span>
                            </div>
                        </form>

                    </div>
                    <!--/.nav-collapse -->

                </div>


            </div>
            <!-- /#navbar -->

        </div>

        <!-- *** NAVBAR END *** -->

    </header>

    <!-- *** LOGIN MODAL ***
_________________________________________________________ -->


    <!-- *** LOGIN MODAL END *** -->

    <div id="heading-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1>@yield('brandName')</h1>
                </div>
                <div class="col-md-5">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">View</a>
                        </li>
                        <li><a href="#">@yield('electronictype')</a>
                        </li>
                        <li>@yield('brandName')</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">

            <div class="row">

                <!-- *** LEFT COLUMN ***
        _________________________________________________________ -->

                <div class="col-md-9">

                    <p class="lead">Check out this awesome electronic!
                    </p>
                    <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product details, material & care and sizing</a>
                    </p>

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                @yield('mainimage')

                            </div>

                            <div class="ribbon sale">
                                <div class="theribbon">SALE</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                            <div class="ribbon new">
                                <div class="theribbon">NEW</div>
                                <div class="ribbon-background"></div>
                            </div>
                            <!-- /.ribbon -->

                        </div>
                        <div class="col-sm-6">
                            <div class="box">

                                <form>
                                    <div class="sizes">

                                        <h3>In Stock!</h3>

                                        {{--<label for="size_s">--}}
                                            {{--<a href="#">4</a>--}}
                                            {{--<input type="radio" id="size_s" name="size" value="s" class="size-input">--}}
                                        {{--</label>--}}
                                        {{--<label for="size_m">--}}
                                            {{--<a href="#">8</a>--}}
                                            {{--<input type="radio" id="size_m" name="size" value="m" class="size-input">--}}
                                        {{--</label>--}}
                                        {{--<label for="size_l">--}}
                                            {{--<a href="#">16</a>--}}
                                            {{--<input type="radio" id="size_l" name="size" value="l" class="size-input">--}}
                                        {{--</label>--}}

                                    </div>

                                    <p class="price">$@yield('price') </p>

                                    <p class="text-center">

                                        @yield('addtowishlist')
                                        
                                    </p>
                                    {{csrf_field()}}
                                </form>
                            </div>

                            <div class="row" id="thumbs">
                                <div class="col-xs-4">
                                    @yield('thumbimage')

                                </div>

                            </div>
                        </div>

                    </div>
                    @yield('itemdetails')

                    <div class="box" id="details">
                        <p>
                        <h4>Product details</h4>

                        @yield('basicdetail')

                        <h4>Product Specification</h4>

                        @yield('specification')

                        <h4>Size & Fit</h4>

                        @yield('size')

                    </div>

                    <div class="box social" id="product-social">
                        <h4>Show it to your friends</h4>
                        <p>
                            <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                        </p>
                    </div>





                </div>
                <!-- /.col-md-9 -->


                <!-- *** LEFT COLUMN END *** -->

                <!-- *** RIGHT COLUMN ***
      _________________________________________________________ -->

                <div class="col-sm-3">

                    <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="{{route('welcomeUser')}}">Electronics <span class="badge pull-right">...</span></a>
                                    <ul>
                                        <li><a href="{{route('viewInventoryDesktop',['type'=>1,'st'=>'default'])}}">Desktops</a>
                                        </li>
                                        <li><a href="{{route('viewInventoryMonitor',['type'=>2,'st'=>'default'])}}">Displays</a>
                                        </li>
                                        <li><a href="{{route('viewInventoryLaptop',['type'=>3,'st'=>'default'])}}">Laptop</a>
                                        </li>
                                        <li><a href="{{route('viewInventoryTablet',['type'=>4,'st'=>'default'])}}">Tablet</a>
                                        </li>
                                    </ul>
                                </li>


                            </ul>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">


                    </div>

                    <div class="panel panel-default sidebar-menu">


                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                    <!-- /.banner -->

                </div>
                <!-- /.col-md-3 -->

                <!-- *** RIGHT COLUMN END *** -->

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->


    <!-- *** GET IT ***
_________________________________________________________ -->




    <!-- *** GET IT END *** -->


    <!-- *** FOOTER ***
_________________________________________________________ -->


    <!-- /#footer -->

    <!-- *** FOOTER END *** -->

    <!-- *** COPYRIGHT ***
_________________________________________________________ -->

    <div id="copyright">
        <div class="container">
            <div class="col-md-12">
                <p class="pull-left">&copy; 2015. EShop</p>
                <p class="pull-right"></p>
            </div>
        </div>
    </div>
    <!-- /#copyright -->

    <!-- *** COPYRIGHT END *** -->



</div>
<!-- /#all -->

<!-- #### JAVASCRIPT FILES ### -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
</script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script src="{{URL::to('js/jquery.cookie.js')}}"></script>
<script src="{{URL::to('js/waypoints.min.js')}}"></script>
<script src="{{URL::to('js/jquery.counterup.min.js')}}"></script>
<script src="{{URL::to('js/jquery.parallax-1.1.3.js')}}"></script>
<script src="{{URL::to('js/front.js')}}"></script>





</body>

</html>