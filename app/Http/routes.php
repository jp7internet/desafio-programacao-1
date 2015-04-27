<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');


Route::get('home', [
	'as' => 'home' ,
	'uses' => 'UploadController@index'
	]);
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('purchase', [
	'as' => 'parse' ,
	'uses' => 'PurchaseController@parse'
	]);

Route::get('upload', function() {
  return View::make('upload');
});

Route::post('upload', 'UploadController@upload');