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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/rooms', 'ChatController@chat_rooms');
    Route::post('/request', 'ChatController@all_in_request');
    Route::post('/me', 'ChatController@user');
    Route::post('/rooms', 'ChatController@rooms');
    Route::post('/messages', 'ChatController@messages');
    Route::post('/messages/save', 'ChatController@save_message');
});
