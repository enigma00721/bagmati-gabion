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



Route::get('/clear' , [
	'as' => 'clear',
	'uses' => 'FrontController@clear'
]);

Route::get('/' , [
	'as' => 'front',
	'uses' => 'FrontController@index'
]);

Route::get('/contactus' , [
	'as' => 'contactus',
	'uses' => 'FrontController@contactus'
]);

Route::get('/aboutus' , [
	'as' => 'aboutus',
	'uses' => 'FrontController@aboutus'
]);

Route::get('/download/brochure' , [
	'as' => 'download.brochure',
	'uses' => 'FrontController@downloadBrochure'
]);


Route::get('/our-service/{slug}' , [
	'as' => 'ourservice',
	'uses' => 'ServiceController@show'
]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?' );


//  contact message send route
Route::post('/contact',[
    'as' =>'contact.send',
    'uses' => 'ContactController@sendMessage'
]);
