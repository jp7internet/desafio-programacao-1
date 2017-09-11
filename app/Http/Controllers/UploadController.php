<?php

namespace App\Http\Controllers;

use Redirect;
use Request;
use Session;

class UploadController extends Controller
{
	//do a .tab file upload
	public function upload() {

	$file = Request::file('file');

	if(!$file)
	    Session::flash('error', 'Error in upload: Select a file.');
	else if ($file->getClientOriginalExtension() != 'tab')
	    Session::flash('error', 'Error in upload: Need be a .tab file.');
	else{
	    $filename = $file->getClientOriginalName();
	    if (Request::input('agree')) {                              // rename filename checkbox
	        $extension = $file->getClientOriginalExtension();       // getting file extension
	        $filename = rand(11111,99999).'.'.$extension;           // renameing file
	    }
	    $destinationPath = 'uploads';                               // upload path        
	    $file->move($destinationPath, $filename);                   // uploading file to given path

	    Session::flash('success', 'Upload successfully'); 

	    return redirect()->route('parse')->with('filename', $filename); //redirect to PurchaseController with filename 
	}
	return view('home');                                          // if can't open file, redirect back to home
	}
}
