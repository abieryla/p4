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



	Route::get('/login', 'Auth\AuthController@getLogin');
	Route::post('/login', 'Auth\AuthController@postLogin');

	Route::get('/register', 'Auth\AuthController@getRegister');
	Route::post('/register', 'Auth\AuthController@postRegister');

	Route::get('/logout', 'Auth\AuthController@logout');

	Route::group(['middleware' => 'auth'], function() {
		Route::post('/wishlist', 'WishlistController@postWishlist');
		Route::get('/wishlist', 'WishlistController@getWishlist');

		Route::get('/wishlist/create', 'WishlistController@getCreate'); 
		Route::post('/wishlist/create', 'WishlistController@postCreate'); 

		Route::get('/wishlist/add/{id?}', 'WishlistController@getAdd'); 
		Route::post('/wishlist/add/{id?}', 'WishlistController@postAdd'); 

		Route::get('/wishlist/delete/{id?}', 'WishlistController@getDelete');
		Route::get('/wishlist/confirmdelete/{id?}', 'WishlistController@getConfirmDelete');

		Route::get('wishlist/connect', 'WishlistController@getConnect');
		Route::post('wishlist/connect', 'WishlistController@postConnect');
	});



	$user = Auth::user();

/*	if($user) {
/		echo 'You are logged in.';
/	else {
/		echo 'You are not logged in.';
/	}
/	return;
*/
