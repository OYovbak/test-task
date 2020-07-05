<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('register', 'API\RegisterController@register');

Route::get('participant', 'ParticipantController@index');
Route::post('participant', 'ParticipantController@create');
Route::put('participant', 'ParticipantController@update');
Route::delete('participant', 'ParticipantController@delete');

Route::get('events', 'EventController@index');
Route::get('events/{id}', 'EventController@show');
Route::post('events/{id}', 'EventController@addParticipant');
Route::delete('events/{id}', 'EventController@deleteParticipant');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
