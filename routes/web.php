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

Route::get('/', function () {
    return view('welcome');
});


//Vistas
Route::group(['prefix' => 'catalogo'],function() {

  //Situacion actual de operacion -> sao
  Route::get('sao', 'Catalogos\SaoController@index')->name('sao.index');
});
