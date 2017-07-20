<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $guarded = array('user_id');

	protected $fillable = ['product_name', 'category', 'price', 'rating', 'review', 'photo'];

	public function user()
    {
        return $this->belongsTo('User','user_id','id');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment','review_id','id');
    }
    
}
