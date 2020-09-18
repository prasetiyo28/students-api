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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students', 'StudentController@index');
Route::get('/students/{id?}', 'StudentController@show');
Route::post('/students', 'StudentController@store');
Route::delete('/students/{id?}', 'StudentController@destroy');
Route::put('/students', 'StudentController@update');