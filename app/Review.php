<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['landmark_id', 'user_id'];

    public function user()
    {

        return $this->belongsTo('App\User');


    }

    public function landmark()
    {

        return $this->belongsTo('App\Landmark');


    }
}
