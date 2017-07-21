<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ProductController@getIndex')->name('product.index');

Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');

Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');

Route::get('/checkout', 'ProductController@getCheckOut')->name('checkout');
Route::post('/checkout', 'ProductController@postCheckOut')->name('checkout');

Route::group(['prefix' => 'user'], function(){


Route::get('/signup', 'UserController@getSignUp')->name('user.signup');

Route::post('/signup', 'UserController@postSignUp')->name('user.signup');

Route::get('/signin', 'UserController@getSignIn')->name('user.signin');

Route::post('/signin', 'UserController@postSignIn')->name('user.signin');

Route::get('/profile', 'UserController@getUserProfile')->name('user.profile');

Route::get('/logout', 'UserController@getLogout')->name('user.logout');

});

