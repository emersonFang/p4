<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
     * Responds to requests to GET /photos, shows all of a user's photos
     */
    public function getIndex() {
        // Get all the photos "owned" by the current logged in user
        // Sort in descending order by id
        $photos = \App\Photo::where('user_id','=',\Auth::id())->orderBy('id','DESC')->get();
        return view('photos.index')->with('photos',$photos);
    }


    public function getAllphotos($id=null) {
        $landmark = \App\Landmark::find($id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }
        return view('photos.list_all')->with('landmark',$landmark);
    }


    /**
     * Responds to requests to GET /photo/show/{id}, shows photos that are specific to the user for a specific landmark
     */
    public function getShow($id= null) {
        $landmark = \App\Landmark::find($id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }
        return view('photos.show')->with('landmark',$landmark);
    }


    /**
     * Responds to requests to GET /photos/{id}/create, where {id} is the id of the landmark that a photo is being created for
     */
    public function getCreate($id= null) {

        $photoModel = new \App\Photo();
        $landmark = \App\Landmark::find($id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }

        return view('photos.create')->with('landmark',$landmark);
    }

    /**
     * Responds to requests to POST /photos/{id}/create
     */
    public function postCreate(Request $request,$id= null)
    {

        $landmark = \App\Landmark::find($id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }

        if (\App\Photo::where('filepath', '=', $request->filepath)->exists()) {
            \Session::flash('flash_message','A Photo with that URL already exists in our database.');
            return redirect('/photos/'.$id);
        }

        $this->validate(
            $request,
            [
                'filepath' => 'required|url',
                'photo_description' => 'required|min:1',
            ]
        );

        # Enter photo
        $photo = new \App\Photo();
        $photo->landmark()->associate($landmark->id);
        $photo->user()->associate(\Auth::id()); # <--- NEW LINE
        $photo->filepath = $request->filepath;
        $photo->photo_description = $request->photo_description;
        $photo->save();

        # Done
        \Session::flash('flash_message', 'Your photo was added!');
        return redirect('/photos/'.$id);

    }

    /**
     * Responds to requests to GET /photos/edit/{$id}
     */
    public function getEdit($id = null) {

        $photo = \App\Photo::find($id);

        if(is_null($photo)) {
            \Session::flash('flash_message','photo not found.');
            return redirect('\photos');
        }

        return view('photos.edit')
            ->with([
                'photo' => $photo,
            ]);

    }

    /**
     * Responds to requests to POST /photos/edit
     */
    public function postEdit(Request $request) {

        $photo = \App\Photo::find($request->id);

        $photo->filepath = $request->filepath;
        $photo->photo_description = $request->photo_description;
        $photo->save();

        \Session::flash('flash_message','Your photo was updated.');
        return redirect('/photos/edit/'.$request->id);

    }



    /**
     *
     */
    public function getConfirmDelete($photo_id) {

        $photo = \App\Photo::find($photo_id);

        $count = \App\Photo::where('landmark_id','=',$photo->landmark_id)->count();
        if($count==1) {
            \Session::flash('flash_message','This is the last photo of the landmark.  We can\'t delete the last photo!');
            return redirect('\photos');
        }

        return view('photos.delete')->with('photo', $photo);
    }

    /**
     *
     */
    public function getDoDelete($photo_id) {

        $photo = \App\Photo::find($photo_id);

        if(is_null($photo)) {
            \Session::flash('flash_message','Photo not found.');
            return redirect('\photos');
        }

        $photo->delete();

        \Session::flash('flash_message','Photo #'.$photo->id.' was deleted.');

        return redirect('/photos');

    }


}