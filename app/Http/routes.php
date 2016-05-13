<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

	# ````````````````````````````````````````````
	#	Authentication Routes
	# ````````````````````````````````````````````

	Route::get('/login', 'Auth\AuthController@getLogin');
	Route::post('/login', 'Auth\AuthController@postLogin');

	Route::get('/register', 'Auth\AuthController@getRegister');
	Route::post('/register', 'Auth\AuthController@postRegister');

	Route::get('/logout', 'Auth\AuthController@logout');

	# `````````````````````````````````````````````
	# 	Wishlist routes - for logged in users
	# `````````````````````````````````````````````

	Route::group(['middleware' => 'auth'], function() {
		Route::get('/wishlist', 'WishlistController@getWishlist');

		Route::get('/wishlist/create', 'WishlistController@getCreate'); 
		Route::post('/wishlist/create', 'WishlistController@postCreate'); 

		Route::get('/wishlist/edit/{id?}', 'WishlistController@getEdit'); 
		Route::post('/wishlist/edit/{id?}', 'WishlistController@postEdit'); 

		Route::get('/wishlist/add/{id?}', 'WishlistController@getAdd'); 
		Route::post('/wishlist/add/{id?}', 'WishlistController@postAdd'); 

		Route::get('/wishlist/deleteitem/{id?}', 'WishlistController@getDeleteItem');
		Route::get('/wishlist/delete/{id?}', 'WishlistController@getDelete');
		Route::get('/wishlist/confirmdelete/{id?}', 'WishlistController@getConfirmDelete');

		Route::get('wishlist/show/{id?}', 'WishlistController@getShow');
		Route::get('wishlist/showcircle/{id?}', 'WishlistController@getShowCircle');

		Route::get('wishlist/share/{id?}', 'WishlistController@getShare');
		Route::post('wishlist/share/{id?}', 'WishlistController@postShare');
	
		Route::get('wishlist/purchased/{id?}', 'WishlistController@getPurchased');
		Route::get('wishlist/update/{id?}', 'WishlistController@getUpdate');
	});



