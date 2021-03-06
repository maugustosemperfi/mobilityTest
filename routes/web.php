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

Route::get('/', 'HomeController@index');
Route::get('/paradas', 'HomeController@todasParadas');
Route::get('/previsaoChegada/{codigoParada}', 'HomeController@previsaoChegadaLinha');
Route::get('/previsaoChegadaLinha/{codLinha}', 'HomeController@previsaoChegadaLinhaParadas');
Route::get('/paradasPorLinha/{codLinha}', 'HomeController@paradasPorLinha');
