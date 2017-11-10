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
    return view('auth.login');
});


//Vistas
Route::group(['prefix' => 'catalogos'],function() {

  //Situacion actual de operacion -> sao
  Route::get('sao', 'Catalogos\SaoController@index')->name('catalogos.sao.index');
  Route::get('dirTecnica', 'Catalogos\dirTecnicaController@index')->name('catalogos.dirTecnica.index');
  Route::get('rcae', 'Catalogos\rcaeController@index')->name('catalogos.rcae.index');
  Route::get('horarioEscolar', 'Catalogos\horarioEscolarController@index')->name('catalogos.horarioEscolar.index');
});

Route::group(['prefix' => 'planesEstudio'], function() {
     Route::get('bdu', 'planesEstudio\bduController@index')->name('planesEstudio.bdu.index');
     Route::get('cch', 'planesEstudio\cchController@index')->name('planesEstudio.cch.index');
     Route::get('enp', 'planesEstudio\enpController@index')->name('planesEstudio.enp.index');
});

Route::group(['prefix' => 'conteo'], function() {
     Route::get('enp', 'conteo\enpController@index')->name('conteo.enp.index');
     Route::get('cch', 'conteo\cchController@index')->name('conteo.cch.index');
     Route::get('materiales', 'conteoMateriales\conteoMaterialesController@index')->name('conteo.materiales.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
