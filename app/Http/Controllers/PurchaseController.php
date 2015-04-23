<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PurcharseController extends Controller {

    /**
     * Show the profile for the given purchase.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        return view('home', ['id' => $id]);
    }

}