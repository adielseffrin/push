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

Route::get('/', 'HomeController@index');
Route::get('/send-message', 'HomeController@sendMessage');
Route::get('/message-sent/{status}', 'HomeController@sendMessage');
Route::post('/send-message', 'SenderController@sendPush');
Route::get('/sent-messages', 'HomeController@sentMessages');
Route::get('/settings', 'HomeController@settings');
Route::get('/settings/{slug}/edit', 'HomeController@editSetting');
patch('/settings/{slug}', 'HomeController@updateSetting');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

post('/register','RegisterController@register');
get('/simulator','RegisterController@index');
