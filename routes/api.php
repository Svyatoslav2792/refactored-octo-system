<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\TidingController;
use App\Http\Controllers\API\ProfileController;
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


Route::post('register', 'API\UserController@register');
Route::post('login', 'API\UserController@login');
Route::apiResource('tiding','API\TidingController');
Route::apiResource('profile','API\ProfileController');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
    Route::post('logout', 'API\UserController@logout');

});