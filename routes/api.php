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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/request', 'ChatController@all_in_request');
Route::post('/me', 'ChatController@user');
Route::post('/rooms', 'ChatController@rooms');
Route::post('/messages', 'ChatController@messages');
Route::post('/messages/save', 'ChatController@save_message');
