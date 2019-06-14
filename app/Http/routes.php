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

Route::get('/home', array('as'=>'home', function()
{
	return View('home');
}));

Route::get('/', function() {
    return View::make('home');
});

Route::get('home', function() {
    return View::make('home');
});

Route::get('/home/addToCart/{token}/{cartItem}', ['as'=>'home.addToCart','uses'=>'CartController@addToCart']); 

Route::get('/viewcart/getItems', ['as'=>'viewcart.getItems','uses'=>'CartController@getItems']); 

Route::get('/viewcart', 'CartController@viewcart'); 

Route::post('/viewcart', 'PaypalPaymentController@paywithCreditCard'); 

Route::resource('/create', 'OTPController@create');

Route::get('/create', 'OTPController@create');

Route::post('/create', 'OTPController@validateToken');

