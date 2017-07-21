@extends('layouts.app')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="active">

                <form role="form" method="GET" action="{{ url('getSearchPublic') }}">

                    <div class="form-group input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search a review by product name" required>
                        <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                    </div>

                </form>

            </li>
        </ol>

        <div class="row">
            <?php $j = 100;?> 
            @foreach($reviews as $review)
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <img class="img" src="./images/camera.jpg"  style="height:85px;" alt="">
                            </div>
                            <a href="#{{ $j }}" data-toggle="modal">
                                <div class="panel-footer">
                                    {{$review->product_name}}
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- modal -->
                    <div class="modal about-modal fade" id="{{ $j }}" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                                        <h4 class="modal-title">{{$review->product_name}}</h4>
                                </div> 
                                <div class="modal-body">
                                    <div class="w3ls-about-info">
                                        <img class="img" src="./images/camera.jpg"  style="height:150px;" alt="">
                                        <br>
                                        
                                        <i class="fa fa-thumbs-up"> {{$review->upvote}} </i>
                                        <i class="fa fa-thumbs-down"> {{$review->downvote}} </i>

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
                    <?php $j++;?>
            @endforeach
        </div>

    </div>
</div>

@endsection
