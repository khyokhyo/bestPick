<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Validator,Hash, DB;
use Redirect;
use Auth;

use App\User, App\Review, App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('home')->with('reviews', $reviews);
    }

    public function postAddReview()
    {
        
        $input = Input::all();

        $id = Auth::user()->getAuthIdentifier();

        $rules = array(
            'product_name' => 'required',
            'category' => 'required',
            'price'=> 'required',
            'review' => 'required',
            'photo' => 'required'
            );
        
        $v = Validator::make($input, $rules);

        if($v->passes())
        {
            $review = new Review();
            $review->user_id = $id;
            $review->product_name = $input['product_name'];
            $review->category = $input['category'];
            $review->price = $input['price'];
            $review->review = $input['review'];
            $review->photo = $input['photo'];

            if($review->save())
                return redirect()->back();
            else
                return redirect()->back();

            /**
             * ekhan theke kaj kore na
             */
            $photo = $input['photo'];

            if(!empty($photo))
            {
                $destinationPath = './files';
                
                $upload_success = $photo->move($destinationPath, $photo);
                
                $review->photo = $destinationPath.'/'.$photo;
                return 30;
                if($review->save()){
                    return redirect()->back();
                }
                else
                    return redirect()->back();
            }
            else
                return redirect()->back();

            /**
             * ei porjonto
             */

        } else {

            return redirect()->back()->withInput()->withErrors($v);
        }
    }
}
