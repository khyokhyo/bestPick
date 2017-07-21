<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Validator,Hash, DB;
use Redirect;
use Auth;

use App\User, App\Review, App\Comment;

class NavController extends Controller
{
	public function getFilterPhone()
    {
    	$input = Input::all();
    	$range = $input['range'];

        $rules = array(
            'range' => 'required'
            );
        
        $v = Validator::make($input, $rules);

        if($v->passes())
        {
        	if($range == 1){
	        	$reviews = Review::where('category', 'Smart Phone')->where('price', '<', 1001)->where('price', '>', 99)->get();
	        	return view('filter')->with('reviews', $reviews);
        	}
        	else if($range == 2){
	        	$reviews = Review::where('category', 'Smart Phone')->where('price', '<', 5001)->where('price', '>', 999)->get();
	        	return view('filter')->with('reviews', $reviews);
        	}
        	else if($range == 3){
	        	$reviews = Review::where('category', 'Smart Phone')->where('price', '<', 10001)->where('price', '>', 4999)->get();
	        	return view('filter')->with('reviews', $reviews);
        	}
        	else if($range == 4){
	        	$reviews = Review::where('category', 'Smart Phone')->where('price', '<', 49999)->where('price', '>', 9999)->get();
	        	return view('filter')->with('reviews', $reviews);
        	}
        	else if($range == 5){
	        	$reviews = Review::where('category', 'Smart Phone')->where('price', '>', 49999)->get();
	        	return view('filter')->with('reviews', $reviews);
        	}
        }
        else
    		return redirect()->back();;


    }

    public function phone()
    {
        $reviews = Review::where('category', 'Smart Phone')->get();
        if (Auth::guest())
        	return view('filter')->with('reviews', $reviews);
    	else
    		return view('filter')->with('reviews', $reviews);
    }

    public function camera()
    {
        $reviews = Review::where('category', 'Camera')->get();
        if (Auth::guest())
        	return view('welcome')->with('reviews', $reviews);
    	else
        	return view('home')->with('reviews', $reviews);
    }

    public function watch()
    {
        $reviews = Review::where('category', 'Watch')->get();
        if (Auth::guest())
        	return view('welcome')->with('reviews', $reviews);
    	else
        	return view('home')->with('reviews', $reviews);
    }

    public function tv()
    {
        $reviews = Review::where('category', 'TV')->get();
        if (Auth::guest())
        	return view('welcome')->with('reviews', $reviews);
    	else
    		return view('home')->with('reviews', $reviews);
    }

    public function clothing()
    {
        $reviews = Review::where('category', 'Clothing')->get();
        if (Auth::guest())
        	return view('welcome')->with('reviews', $reviews);
    	else
    		return view('home')->with('reviews', $reviews);
    }

    public function shoes()
    {
        $reviews = Review::where('category', 'Shoes')->get();
        if (Auth::guest())
        	return view('welcome')->with('reviews', $reviews);
    	else
    		return view('home')->with('reviews', $reviews);
    }

    public function others()
    {
        $reviews = Review::where('category', 'Others')->get();
        if (Auth::guest())
        	return view('welcome')->with('reviews', $reviews);
    	else
    		return view('home')->with('reviews', $reviews);
    }

}
