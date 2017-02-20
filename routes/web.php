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

Route::get('/' ,[
    	'uses' => 'UserController@welcome',
		'as' => 'welcome'
])->middleware('auth');

Route::get('/viewer', function () {
    return view('viewer');
})->name('pdf');

Route::get('/home', function(){
	return view('welcome');
})->name('home');

Route::get('/paypal', function(){
	return view('paywithpaypal');
})->name('paypal');


Route::post('/Dashboard', [
    	'uses' => 'UserController@adminSignIn',
		'as' => 'adminSignIn'
		]);
Route::post('/emailCheck', [
    	'uses' => 'UserController@emailCheck',
		'as' => 'emailCheck'
		]);

Route::post('/addImage', [
    	'uses' => 'UserController@addImage',
		'as' => 'addImage'
		]);
		
Route::get('/admindashboard', [
    	'uses' => 'UserController@admindashboard',
		'as' => 'admindashboard'
		])->middleware('auth');
		
Route::post('/login', [
		'uses' => 'UserController@logIn',
		'as' => 'login'
		]);

/////////////////////////////////////////////////////////////////////		
Route::get('/forgotPass', function(){
		return view('forgotPass');
		})->name('forgotPass');

Route::post('/forgot', [
		'uses' => 'UserController@forgot',
		'as' => 'forgot'
		]);
		
Route::get('/forgotPassword/{data?}',[
    'uses' => 'UserController@forgotPassword',
    'as' => 'forgotPassword',
	]);		

///////////////////////////////////////////////////////////////////////
Route::get('/signout', [
		'uses' => 'UserController@signout',
		'as' => 'signout'
		]);

Route::get('/verifyMail/{data?}',[
    'uses' => 'UserController@verifyMail',
    'as' => 'verifyMail',
	'middleware' => 'email'
	]);
	
Route::get('addmoney/paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('addmoney/paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('addmoney/paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));



Route::get('/uploadImage', function(){
	return view('uploadImage');
})->name('uploadImage');

