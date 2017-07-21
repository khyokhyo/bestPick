<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Validator,Hash, DB;
use Redirect;
use App\User, App\Review, App\Comment;

class UnauthController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('welcome')->with('reviews', $reviews);
    }

    public function getSearchPublic()
    {
        $input = Input::all();
        $search = $input['search'];

        $rules = array(
            'search' => 'required'
            );
        
        $v = Validator::make($input, $rules);

        if($v->passes())
        {
            $reviews = Review::where('product_name', 'LIKE', '%'. $search .'%')->get();
            return view('welcome')->with('reviews', $reviews);
        } else {

            return redirect()->back()->withInput()->withErrors($v);
        }
    }
}
