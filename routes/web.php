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

Route::group(['prefix' => ''], function() {
    Route::get('usuarios/index', 'Admin\UsuariosController@index')->name('admin.usuarios.index');
    Route::get('usuarios/create', 'Admin\UsuariosController@create')->name('admin.usuarios.create');
    Route::post('usuarios/create', 'Auth\RegisterController@register');
});

// Authentication Routes...
Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
  'as' => 'logout',
  'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
  'as' => 'password.email',
  'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
  'as' => 'password.request',
  'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
  'as' => '',
  'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
  'as' => 'password.reset',
  'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);

Route::get('/home', 'HomeController@index')->name('home');
