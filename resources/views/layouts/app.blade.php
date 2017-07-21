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
                                <a href="{{ url('phone') }}">Smart Phone</a>
                            </li>
                            <li>
                                <a href="{{ url('camera') }}">Camera</a>
                            </li>
                            <li>
                                <a href="{{ url('watch') }}">Wrist Watch</a>
                            </li>
                            <li>
                                <a href="{{ url('tv') }}">TV</a>
                            </li>
                            <li>
                                <a href="{{ url('clothing') }}">Clothing</a>
                            </li>
                            <li>
                                <a href="{{ url('shoes') }}">Shoes</a>
                            </li>
                            <li>
                                <a href="{{ url('others') }}">Others</a>
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
                                <?php $i = 10;?> 
                                @foreach($reviews as $review)
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <img class="img" src="./images/p.jpg"  style="height:85px;" alt="">
                                                </div>
                                                <a href="#{{ $i }}" data-toggle="modal">
                                                    <div class="panel-footer">
                                                        {{$review->product_name}}
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- modal -->
                                        <div class="modal about-modal fade" id="{{ $i }}" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header"> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                                                            <h4 class="modal-title">{{$review->product_name}}</h4>
                                                    </div> 
                                                    <div class="modal-body">
                                                        <div class="w3ls-about-info">
                                                            <img class="img" src="./images/p.jpg"  style="height:150px;" alt="">
                                                            <br>
                                                            
                                                            @if (Auth::guest())
                                                            <i class="fa fa-thumbs-up"> {{$review->upvote}} </i>
                                                            <i class="fa fa-thumbs-down"> {{$review->downvote}} </i>
                                                            @else
                                                            <a  href="{{route('upvote', $review->id)}}"><i class="fa fa-thumbs-up"> {{$review->upvote}} </i></a>
                                                            <a  href="{{route('downvote', $review->id)}}"><i class="fa fa-thumbs-down"> {{$review->downvote}} </i></a>
                                                            @endif

                                                            <h4>Category</h4>
                                                            <p>{{$review->category}}</p>
                                                            <h4>Price</h4>
                                                            <p>{{$review->price}}</p>
                                                            <h4>Review</h4>
                                                            <p>{{$review->review}}</p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- //modal -->
                                        <?php $i++;?>
                                @endforeach

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
