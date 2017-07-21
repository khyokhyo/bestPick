@extends('layouts.app')

@section('content')

<div id="page-wrapper">

    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="active">

                <form role="form">

                    <div class="form-group input-group">
                        <input type="text" class="form-control" placeholder="Search a review by product name">
                        <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                    </div>

                </form>

            </li>

        <a href="#create" class="page-scroll btn btn-primary" data-toggle="modal">Post a new review</a>
        </ol>

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
            @foreach($reviews as $review)
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <img class="img" src="./images/camera.jpg"  style="height:85px;" alt="">
                            </div>
                            <a href="#review" data-toggle="modal">
                                <div class="panel-footer">
                                    {{$review->product_name}}
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- modal -->
					<div class="modal about-modal fade" id="review" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header"> 
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
										<h4 class="modal-title">Product Name</h4>
								</div> 
								<div class="modal-body">
									<div class="w3ls-about-info">
										<img class="img" src="./images/camera.jpg"  style="height:150px;" alt="">
										<br>
                                        
                                        <a  href="/home"><i class="fa fa-thumbs-up"> 20 </i></a>
                                        <a  href="/home"><i class="fa fa-thumbs-down"> 3 </i></a>

										<h4>Category</h4>
										<p>Camera</p>
										<h4>Price</h4>
										<p>Tk.7000</p>
										<h4>Review</h4>
										<p>To get started, let's create an Eloquent model. Models typically live in the app directory, but you are free to place them anywhere that can be auto-loaded according to your composer.json file. All Eloquent models extend Illuminate\Database\Eloquent\Model class.</p>
										
    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<!-- //modal -->
            @endforeach
        </div>

    </div>
</div>

@endsection
