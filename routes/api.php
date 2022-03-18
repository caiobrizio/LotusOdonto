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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clientes', "App\Http\Controllers\ClientesController@index");
Route::post('/clientes', "App\Http\Controllers\ClientesController@create");
Route::get('/clientes/{id}', "App\Http\Controllers\ClientesController@show");
Route::put('/clientes', "App\Http\Controllers\ClientesController@update");
Route::delete('/clientes/{id}', "App\Http\Controllers\ClientesController@destroy");