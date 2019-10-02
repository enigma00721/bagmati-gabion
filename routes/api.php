<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', 'API\UserController@AuthRouteAPI');

Route::get('/getDashboardData','API\DashboardController@index');

//user
Route::apiResource('user','API\UserController');

// slider
Route::apiResource('slider','API\SliderController');
Route::post('slider/sorting','API\SliderController@sortOrder');

// service
Route::apiResource('service','API\ServiceController');
Route::post('service/sorting','API\ServiceController@sortOrder');

// team
Route::apiResource('team','API\TeamController');

// gallery
Route::apiResource('gallery','API\GalleryController');

// testimonial
Route::apiResource('testimonial','API\TestimonialController');

// contact
Route::get('contact','API\ContactController@index');
Route::delete('contact/{id}','API\ContactController@destroy');

// ------- routes for company info -----------------

Route::get('company/info','API\InfoController@getData');

Route::post('logo/upload','API\InfoController@logoUpload');

Route::post('about/info','API\InfoController@saveAboutCompanyInfo');
Route::post('about/message','API\InfoController@saveAboutCompanyMessage');
Route::post('basic/info','API\InfoController@saveCompanyBasicInfo');
Route::post('social/info','API\InfoController@saveCompanySocialInfo');
Route::post('project/info','API\InfoController@saveCompanyProjectInfo');
