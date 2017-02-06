<?php

use App\Http\Controllers\PagesController;

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

Route::group(['middleware' => 'auth'], function()
{
	Route::get('/mojeposty','PostController@myPosts');
	Route::get('tags/{slug}', ['as'=>'how.base', 'uses'=>'BaseController@getTag']);
	Route::get('/edit_nr_layout','PagesController@changeLayout');
	Route::get('/posts/edit/{id}','PostController@edit');
	Route::get('/posts/create','PostController@create');
	Route::post('posts/store','PostController@store');
	Route::post('/index/{id}','PostController@update');
	Route::get('/index/{id}','PostController@destroy');
	Route::get('/delete_photo/{title}/{id}','PhotoController@delete_photo');
	Route::post('/add_photo','PhotoController@add_photo');
	Route::post('/posts/layout/update','PagesController@changeNrLayout');

});
Route::get('/posts/show/{id}/{title}','PostController@show');
Route::get('/','PagesController@getIndex');
Route::get('kontakt','PagesController@getContact');
Route::get('onas','PagesController@getAbout');
Route::get('posts/{id}','PostController@show');
Route::get('/home', 'HomeController@index');
Route::resource('tags','TagController',['except'=>['create']]);
Route::get('/tags','TagController@index');
Route::post('/tags/store','TagController@store');
//Route::post('/tags/destroy/{id}','TagController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index');
