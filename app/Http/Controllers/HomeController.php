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

    public function getSearch()
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
            return view('home')->with('reviews', $reviews);
        } else {

            return redirect()->back()->withInput()->withErrors($v);
        }
    }

    public function postAddReview(Request $request)
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


            $file = $request->file('photo');

            if(!empty($file))
            {
                $destinationPath = 'photos';
                $filename =Auth::user()->name.rand(11111,99999).$file;
                $request->file('photo')->move($destinationPath, $filename);
                return 0;
                
                $attachment = new Attachment();
                $attachment->notice_id = $notice->id;
                $attachment->name = $filename;
                $attachment->link = $destinationPath.'/'.$filename;
                $attachment->save();
            }

            else
                return 1;

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

    public function upvote($id)
    {
        $review = Review::where('id', $id)->first();
        $upvote = $review->upvote;
        $upvote++;
        $review = Review::where('id', $id)->update(array(
                'upvote' => $upvote
            ));
        return redirect()->back();
    }

    public function downvote($id)
    {
        $review = Review::where('id', $id)->first();
        $downvote = $review->downvote;
        $downvote++;
        $review = Review::where('id', $id)->update(array(
                'downvote' => $downvote
            ));
        return redirect()->back();
    }
}
