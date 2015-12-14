<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function landmarks() {
        return $this->belongsToMany('App\Landmark');
    }

    public function getTagsForCheckboxes() {

        $tags = $this->orderBy('tag','ASC')->get();

        $tagsForCheckboxes = [];

        foreach($tags as $tag) {
            $tagsForCheckboxes[$tag['id']] = $tag;
        }

        return $tagsForCheckboxes;

    }
}
