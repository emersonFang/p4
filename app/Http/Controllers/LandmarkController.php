<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function getAllLandmarks() {
        return view('landmarks.list_all');
    }

    /**
     * Responds to requests to GET /landmarks/show/{id}
     */
    public function getShow($id= null) {
        $landmark = \App\Landmark::with('tags')->find($id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }
        return view('landmarks.show')->with('landmark',$landmark);
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
                'filepath' => 'required|url',
                'photo_description' => 'required|min:1'
            ]
        );

        # Enter landmark and its photo into the database
        $landmark = new \App\Landmark();
        $landmark->name = $request->name;
        $landmark->description = $request->description;
        $landmark->location = $request->location;
        $landmark->user_id = \Auth::id(); # <--- NEW LINE

        $landmark->save();

        $photo = new \App\Photo();
        $photo->filepath = $request->filepath;
        $photo->photo_description = $request->photo_description;
        $photo->landmark_id = $landmark->id;
        $photo->user_id = \Auth::id();

        $photo->save();

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

    /**
     * Responds to requests to GET /landmarks/edit/{$id}
     */
    public function getEdit($id = null) {

        # Get this book and eager load its tags
        $landmark = \App\Landmark::with('tags')->find($id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }

        # Get all the possible tags so we can include them with checkboxes in the view
        $tagModel = new \App\Tag();
        $tags_for_checkbox = $tagModel->getTagsForCheckboxes();

        /*
        Create a simple array of just the tag names for tags associated with this book;
        will be used in the view to decide which tags should be checked off
        */
        $tags_for_this_landmark = [];
        foreach($landmark->tags as $tag) {
            $tags_for_this_landmark[] = $tag->tag;
        }

        return view('landmarks.edit')
            ->with([
                'landmark' => $landmark,
                'tags_for_checkbox' => $tags_for_checkbox,
                'tags_for_this_landmark' => $tags_for_this_landmark,
            ]);

    }

    /**
     * Responds to requests to POST /landmarks/edit
     */
    public function postEdit(Request $request) {

        $landmark = \App\Landmark::find($request->id);

        $landmark->name = $request->name;
        $landmark->description = $request->description;
        $landmark->location = $request->location;
        $landmark->save();

        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $landmark->tags()->sync($tags);

        \Session::flash('flash_message','Your landmark was updated.');
        return redirect('/landmarks/edit/'.$request->id);

    }



    /**
     *
     */
    public function getConfirmDelete($landmark_id) {

        $landmark = \App\Landmark::find($landmark_id);

        return view('landmarks.delete')->with('landmark', $landmark);
    }

    /**
     *
     */
    public function getDoDelete($landmark_id) {

        $landmark = \App\Landmark::find($landmark_id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }

        if($landmark->tags()) {
            $landmark->tags()->detach();
        }

        $landmark->delete();

        \Session::flash('flash_message',$landmark->name.' was deleted.');

        return redirect('/landmarks');

    }


}