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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\RegisterController@login');
   
Route::middleware('auth:api')->group( function () {
   //secured routes
});

Route::post('twillio/message', 'Api\TwilioController@sendMessage');
Route::post('twillio/call', 'Api\TwilioController@sendCall');