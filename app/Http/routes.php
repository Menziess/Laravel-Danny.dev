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

# Login and registration
Route::auth();

# Landing page
Route::get('/', 'PagesController@getIndex');

# Other routes
Route::group(['middleware' => 'auth'], function () {
	Route::controller('/users', 'UsersController');
});

# Public portfolio
Route::get('/{slug}', 'UsersController@portfolio');


