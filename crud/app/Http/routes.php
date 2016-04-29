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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sales', 'SalesController');

// Route::get('/sales', ['as' => 'sales.index', 'uses' => 'SalesController@index']);
// Route::post('/sales', ['as' => 'sales.store', 'uses' => 'SalesController@store']);
// Route::get('/sales/{sales}', ['as' => 'sales.show', 'uses' => 'SalesController@show']);
// Route::get('/sales/create', ['as' => 'sales.create', 'uses' => 'SalesController@create']);
// Route::get('/sales/{sales}/edit', ['as' => 'sales.edit', 'uses' => 'SalesController@edit']);
// Route::post('/sales/{sales}', ['as' => 'sales.update', 'uses' => 'SalesController@update']);
// Route::get('/sales/{sales}/destroy', ['as' => 'sales.destroy', 'uses' => 'SalesController@destroy']);
