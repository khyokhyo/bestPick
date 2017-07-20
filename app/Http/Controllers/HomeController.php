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
        return view('home');
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

            return $photo=Input::file('photo');
            
            if(!empty($photo))
            {
                $destinationPath = './files';
                $extension = $file->getClientOriginalExtension();

                $filename =Auth::user()->name.rand(11111,99999).'.'.$extension;
                
                $upload_success = $photo->move($destinationPath, $filename);
                
                $review->photo = $destinationPath.'/'.$filename;
                if($review->save()){
                    return redirect()->back();
                }
                else
                    return redirect()->back();
            }
            else
                return redirect()->back();

        } else {

                return redirect()->back()->withInput()->withErrors($v);
        }
    }
}
