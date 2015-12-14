<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LandmarkController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
     * Responds to requests to GET /landmark
     */
    public function getIndex() {
        // Get all the landmarks "owned" by the current logged in users
        // Sort in descending order by name
        $landmarks = \App\Landmark::where('user_id','=',\Auth::id())->orderBy('id','DESC')->get();
        return view('landmarks.index')->with('landmarks',$landmarks);

        //return view('landmarks.list_all');
    }

    /**
     * Responds to requests to GET /landmarks/show/{id}
     */
    public function getShow($name= null) {
        return view('landmarks.show')->with('name',$name);
    }


    /**
     * Responds to requests to GET /landmarks/create
     */
    public function getCreate() {

        $LandmarkModel = new \App\Landmark();

        # Get all the possible tags so we can include them with checkboxes in the view
        $tagModel = new \App\Tag();
        $tags_for_checkbox = $tagModel->getTagsForCheckboxes();

        return view('landmarks.create')
            ->with('tags_for_checkbox',$tags_for_checkbox);
    }

    /**
     * Responds to requests to POST /landmark/create
     */
    public function postCreate(Request $request)
    {

        $this->validate(
            $request,
            [
                'name' => 'required|min:5',
                'description' => 'required|min:1',
                'location' => 'required|min:1',
            ]
        );

        # Enter landmark and its photo into the database
        $landmark = new \App\Landmark();
        $landmark->title = $request->name;
        $landmark->description = $request->description;
        $landmark->location = $request->location;
        $landmark->user_id = \Auth::id(); # <--- NEW LINE


        $landmark->save();

        # Add the tags
        if ($request->tags) {
            $tags = $request->tags;
        } else {
            $tags = [];
        }
        $landmark->tags()->sync($tags);

        # Done
        \Session::flash('flash_message', 'Your landmark was added!');
        return redirect('/landmarks');

    }

}
