<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'UnauthController@index');
Route::get('/getSearchPublic', 'UnauthController@getSearchPublic');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/getSearch', 'HomeController@getSearch');
Route::post('/addReview', 'HomeController@postAddReview');
Route::get('upvote/{id}', array('uses' => 'HomeController@upvote', 'as' => 'upvote'));
Route::get('downvote/{id}', array('uses' => 'HomeController@downvote', 'as' => 'downvote'));
Route::get('/phone', array('uses' => 'NavController@phone', 'as' => 'phone'));
Route::get('/camera', array('uses' => 'NavController@camera', 'as' => 'camera'));
Route::get('/watch', array('uses' => 'NavController@watch', 'as' => 'watch'));
Route::get('/tv', array('uses' => 'NavController@tv', 'as' => 'tv'));
Route::get('/clothing', array('uses' => 'NavController@clothing', 'as' => 'clothing'));
Route::get('/shoes', array('uses' => 'NavController@shoes', 'as' => 'shoes'));
Route::get('/others', array('uses' => 'NavController@others', 'as' => 'others'));
Route::get('/getFilterPhone', 'NavController@getFilterPhone');
Route::get('/getFilterCamera', 'NavController@getFilterCamera');