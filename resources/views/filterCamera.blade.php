@extends('layouts.app')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="active">

                <form role="form" method="GET" action="{{ url('getSearch') }}">

                    <div class="form-group input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search a review by product name" required>
                        <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></span>
                    </div>

                </form>

            </li>

        @if (!(Auth::guest()))
        <a href="#create" class="page-scroll btn btn-primary" data-toggle="modal">Post a new review</a>
        @endif

        </ol>

        <form role="form" method="GET" action="{{ url('getFilterCamera') }}">

            <div class="form-group input-group">
                <select class="form-control" name="range" required>
                    <option value=1> Tk.100 - Tk.1000 </option>
                    <option value=2> Tk.1000 - Tk.5000 </option>
                    <option value=3> Tk.5000 - Tk.10000 </option>
                    <option value=4> Tk.10000 - Tk.50000 </option>
                    <option value=5> Tk.50000 + </option>
                </select>
                <span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fa fa-money"></i></button></span>
            </div>

        </form>

        <!-- modal -->
        <div class="modal about-modal fade" id="create" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>                        
                            <h4 class="modal-title">Post a new review</h4>
                    </div> 
                    <div class="modal-body">
                        <div class="w3ls-about-info">
                            <form role="form" method="POST" action="{{ url('addReview') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" name="product_name" required>
                            </div>

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category" required>
                                    <option>Smart Phone</option>
                                    <option>Camera</option>
                                    <option>Wrist Watch</option>
                                    <option>TV</option>
                                    <option>Clothing</option>
                                    <option>Shoes</option>
                                    <option>Others</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" type="number" name="price" required>
                            </div>

                            <div class="form-group">
                                <label>Review</label>
                                <textarea class="form-control" rows="3" name="review" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>Upload Photo</label>
                                <input type="file" name="photo" required>
                            </div>

                            <button type="submit" class="btn btn-success">Post</button>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //modal -->

        <div class="row">
            <?php $i = 10;?> 
            @foreach($reviews as $review)
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <img class="img" src="./images/camera.jpg"  style="height:85px;" alt="">
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
										<img class="img" src="./images/camera.jpg"  style="height:150px;" alt="">
										<br>
                                        
                                        <a  href="{{route('upvote', $review->id)}}"><i class="fa fa-thumbs-up"> {{$review->upvote}} </i></a>
                                        <a  href="{{route('downvote', $review->id)}}"><i class="fa fa-thumbs-down"> {{$review->downvote}} </i></a>

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

@endsection
