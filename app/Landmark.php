<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function user()
    {

        return $this->belongsTo('User');


    }

    public function review() {
        return $this->hasMany('App\Review');
    }

    public function photo() {
        return $this->hasMany('App\Photo');
    }

}
