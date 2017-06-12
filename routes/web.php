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

Route::get('/', 'HomeController@init');
Route::get('/paradas', 'HomeController@todasParadas');
Route::get('/parada/{codigoParada}', 'HomeController@paradasComLinhas');
Route::get('/Parada/{codigoParada}/{codigoLinha}', 'HomeController@previsaoChegadaLinha');
