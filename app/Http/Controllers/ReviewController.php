<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller {

    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }

    /**
     * Responds to requests to GET /reviews, shows all of a user's reviews
     */
    public function getIndex() {
        // Get all the reviews "owned" by the current logged in user
        // Sort in descending order by id
        $reviews = \App\Review::where('user_id','=',\Auth::id())->orderBy('id','DESC')->get();
        return view('reviews.index')->with('reviews',$reviews);
    }

    /**
        public function getAllReviews() {
            return view('landmarks.list_all');
        }
    */

    /**
     * Responds to requests to GET /review/show/{id}, shows reviews that are specific to the user for a specific landmark
     */
    public function getShow($id= null) {
        $landmark = \App\Landmark::find($id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }
        return view('reviews.show')->with('landmark',$landmark);
    }


    /**
     * Responds to requests to GET /reviews/{id}/create, where {id} is the id of the landmark that a review is being created for
     */
    public function getCreate($id= null) {

        $ReviewModel = new \App\Review();
        $landmark = \App\Landmark::find($id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }

        return view('reviews.create')->with('landmark',$landmark);
    }

    /**
     * Responds to requests to POST /reviews/{id}/create
     */
    public function postCreate(Request $request,$id= null)
    {

        $landmark = \App\Landmark::find($id);

        if(is_null($landmark)) {
            \Session::flash('flash_message','Landmark not found.');
            return redirect('\landmarks');
        }

        $this->validate(
            $request,
            [
                'review' => 'required|min:1',
            ]
        );

        # Enter review
        $review = new \App\Review();
        $review->landmark()->associate($landmark->id);
        $review->user()->associate(\Auth::id()); # <--- NEW LINE
        $review->review = $request->review;
        $review->save();

        # Done
        \Session::flash('flash_message', 'Your review was added!');
        return redirect('/reviews');

    }

    /**
     * Responds to requests to GET /reviews/edit/{$id}
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
     * Responds to requests to POST /reviews/edit
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
    public function getConfirmDelete($review_id) {

        $review = \App\Review::find($review_id);

        return view('reviews.delete')->with('review', $review);
    }

    /**
     *
     */
    public function getDoDelete($review_id) {

        $review = \App\Landmark::find($review_id);

        if(is_null($review)) {
            \Session::flash('flash_message','Review not found.');
            return redirect('\landmarks');
        }

        $review->delete();

        \Session::flash('flash_message',$review->id.' was deleted.');

        return redirect('/landmarks');

    }


}