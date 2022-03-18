<?php

use Illuminate\Support\Facades\Route;

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
})->name ('site.home');  

Route::get('/listagem_de_clientes', function () {
    return view('welcome');
})->name ('site.listagem_de_clientes'); 

Route::get('/horario', function () {
    return view('welcome');
})->name ('site.horario'); 

Route::get('/data', function () {
    return view('welcome');
})->name ('site.data'); 
