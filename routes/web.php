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

/* Route::get('/', function () {
	return view('index');
}); */

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@home')->name('home');

Route::group(['prefix' => 'chat'], function(){
	Route::get('/open/{user_id}', 'HomeController@index')->name('chat');
	Route::get('/get/{user_id}', 'HomeController@get_chat')->name('get.chat');
	Route::get('/create/{user_id}', 'ChatController@create')->name('create.chat');
});

Route::group(['prefix' => 'perfil'], function(){
	Route::get('/', 'HomeController@index')->name('perfil');
	Route::put('/update', 'UserController@update')->name('perfil.update');
	Route::put('/update-password', 'UserController@updatePassword')->name('perfil.update.password');
	Route::post('/imagen', 'UserController@profilePicture')->name('perfil.update.picture');
});

Route::group(['prefix' => 'test'], function(){
	Route::get('/laravel-echo', 'TestEchoController@index')->name('test.echo');
	Route::post('/send-echo', 'TestEchoController@sendEcho')->name('send.echo');
});