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


Route::group(['middleware' => 'auth'], function () {

Route::get('/', 'CouponController@getIndex');

Route::get('/coupons', 'CouponController@getIndex');

Route::get('/coupons/create', 'CouponController@getcreate');
Route::post('/coupons/create', 'CouponController@postcreate');

Route::get('/coupons/edit/{id?}', 'CouponController@getedit');
Route::post('/coupons/edit', 'CouponController@postEdit');

Route::get('/coupons/confirm-delete/{id?}', 'CouponController@getConfirmDelete');
Route::get('/coupons/delete/{id?}', 'CouponController@getDoDelete');
});

//User Authentication
# Show login form
Route::get('/login', 'Auth\AuthController@getLogin');

# Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

# Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

# Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

# Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');

# Process logout
Route::get('/logout/confirm', function(){
	echo 'You have been logged out.';
});