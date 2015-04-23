<?php namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Request;
use Session;

class UploadController extends Controller {

  public function __construct()
  {
	$this->middleware('auth');
  }

  /**
   * Show the application dashboard to the user.
   *
   * @return Response
   */
  public function index()
  {
	return view('upload');
  }

  public function upload() {

	// getting all of the post data
	$file = Request::file('file');

	if(!$file)
		Session::flash('error', 'Error in upload: Select a file.');
	else if ($file->getClientOriginalExtension() != 'tab')
	  Session::flash('error', 'Error in upload: Need be a .tab file.');
	else{
		$fileName = $file->getClientOriginalName();
		if (Request::input('agree')) {			
			$extension = $file->getClientOriginalExtension(); // getting file extension
			$fileName = rand(11111,99999).'.'.$extension; // renameing file
		}
		$destinationPath = 'uploads'; // upload path		
		$file->move($destinationPath, $fileName); // uploading file to given path

		// sending back with message
		Session::flash('success', 'Upload successfully'); 
		return view('upload', ['fileName' => $fileName]);
	}
	return view('upload');
  }

}