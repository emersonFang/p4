<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function user()
    {

        return $this->belongsTo('App\User');


    }

    public function landmark()
    {

        return $this->belongsTo('App\Landmark');


    }
}
