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

//Auth::routes();
//Route::get('/','PostsController@index');
//Route::get('/home', 'PostsController@index');
//Route::get('/{slug}','PostsController@show')->where('slug', '[A-Za-z0-9-_]+');
//Route::group(['middleware' => ['auth']], function() {
	//Route::Post('comment/add','CommentsController@store');
Auth::routes();
Route::get('/','PostsController@index');
Route::get('/home', 'PostsController@index');
Route::get('/{slug}', 'PostsController@show')->where('slug', '[A-Za-z0-9-_]+');
Route::get('logout', function (){Auth::logout();return redirect('/');});
Route::group(['middleware' => ['auth']], function() {
  Route::post('comment/add','CommentsController@store');

});