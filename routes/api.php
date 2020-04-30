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
Route::post('/profile/create', 'ProfileController@store');
Route::get('/profile/edit/{id}', 'ProfileController@edit');
Route::get('/show/{id}', 'ProfileController@show');
Route::post('/profile/update/{id}', 'ProfileController@update');
Route::delete('/profile/delete/{id}', 'ProfileController@delete');
Route::get('/profiles', 'ProfileController@index');

