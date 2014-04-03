<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::any('login', 'HomeController@login');
Route::any('logout', 'HomeController@logout');

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function() {
	
    Route::get('/', 'Admin_HomeController@index');
	
    Route::resource('user', 'Admin_UserController');
    Route::resource('studio', 'Admin_StudioController');
	
    Route::resource('video', 'Admin_VideoController');
	
	Route::group(array('prefix' => 'video'), function() {
		Route::resource('{video_id}/price', 'Admin_PriceController');
	});
	
});