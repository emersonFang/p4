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
        return view('landmarks.list_all');
    }

    /**
     * Responds to requests to GET /landmarks/show/{id}
     */
    public function getShow($id) {
        return 'Show landmark: '.$id;
    }

    /**
     * Responds to requests to GET /landmarks/create
     */
    public function getCreate() {
        return 'Form to create a new landmark';
    }

    /**
     * Responds to requests to POST /landmarks/create
     */
    public function postCreate() {
        return 'Process adding new landmark';
    }
}
