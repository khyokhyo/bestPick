<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>bestPick</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Styles
    <link href="/css/app.css" rel="stylesheet">
     -->

    <!-- Scripts
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    -->
</head>
<body>
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if (Auth::guest())
                <a class="navbar-brand" href="/">bestPick</a>
                @else
                <a class="navbar-brand" href="/home">bestPick</a>
                @endif
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                        
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                         
                            <i class="fa fa-fw fa-power-off"></i> Log Out
                            </a>
                            
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                @endif

                </li>
            </ul>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#category"> Category <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="category" class="collapse">
                            <li>
                                <a href="#">Smart Phone</a>
                            </li>
                            <li>
                                <a href="#">Camera</a>
                            </li>
                            <li>
                                <a href="#">Wrist Watch</a>
                            </li>
                            <li>
                                <a href="#">TV</a>
                            </li>
                            <li>
                                <a href="#">Clothing</a>
                            </li>
                            <li>
                                <a href="#">Shoes</a>
                            </li>
                            <li>
                                <a href="#">Others</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#price"> Price Range <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="price" class="collapse">
                            <li>
                                <a href="#"> Tk.100 - Tk.1000 </a>
                            </li>
                            <li>
                                <a href="#"> Tk.1000 - Tk.5000 </a>
                            </li>
                            <li>
                                <a href="#"> Tk.5000 - Tk.10000 </a>
                            </li>
                            <li>
                                <a href="#"> Tk.10000 - Tk.50000 </a>
                            </li>
                            <li>
                                <a href="#"> Tk.50000 + </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div class="container-fluid">

                <div class="row">
                    <div id="wrapper" class="col-md-8">
                        @yield('content')

                    </div>

                    <div class="col-md-4">
                        <div id="page-wrapper">

                            <div class="container-fluid">
                                <ol class="breadcrumb">
                                    <li class="active">
                                        <i class="fa fa-check-square"></i> Recommended
                                    </li>
                                </ol>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-tasks fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">12</div>
                                                        <div>New Tasks!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-tasks fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">12</div>
                                                        <div>New Tasks!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-tasks fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">12</div>
                                                        <div>New Tasks!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    
                </div>
                <!-- /.row -->

            </div>



    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
