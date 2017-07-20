<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function review()
    {
        return $this->belongsTo('Review','review_id','id');
    }

    public function user()
    {
        return $this->belongsTo('User','user_id','id');
    }
}
