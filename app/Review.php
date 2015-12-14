<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {

        return $this->belongsTo('User');


    }

    public function landmark()
    {

        return $this->belongsTo('Landmark');


    }
}
