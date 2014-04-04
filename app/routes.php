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

/*
 * Public routes
 */

Route::any('login', 'HomeController@login');
Route::any('logout', 'HomeController@logout');

Route::get('{type}-{slug}', array('as' => 'video-details', 'uses' => 'VideoController@details'))
		->where('type', 'movie|serie|episode')
		->where('slug', '[a-z0-9-_]+');

/*
 * Admin routes with admin/ prefix 
 */

Route::group(array('prefix' => 'admin', 'before' => 'admin'), function() {
	
    Route::get('/', 'Admin_HomeController@index');
	
    Route::resource('user', 'Admin_UserController');
    Route::resource('studio', 'Admin_StudioController');
    Route::resource('genre', 'Admin_GenreController');
    Route::resource('person/{role}', 'Admin_PersonController');
	
    Route::resource('video', 'Admin_VideoController');
	
	Route::group(array('prefix' => 'video'), function() {
		Route::resource('{video}/price', 'Admin_PriceController');
	});
	
});