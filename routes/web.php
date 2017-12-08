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

$prefix = '';
if (request()->server('SERVER_ADDR') == '132.247.147.90') {
    $prefix = '/mussi/public/index.php';
}
$prefix = '';
Route::group(['prefix' => $prefix, 'middleware' => ['is_admin']], function() {

    Route::get('/home', 'HomeController@index')->name('home');

    //Vistas
    Route::group(['prefix' => 'catalogos'],function() {

      //Situacion actual de operacion -> sao
      Route::get('sao', 'Catalogos\SaoController@index')->name('catalogos.sao.index');
      Route::get('dirTecnica', 'Catalogos\dirTecnicaController@index')->name('catalogos.dirTecnica.index');
      Route::get('rcae', 'Catalogos\rcaeController@index')->name('catalogos.rcae.index');
      Route::get('horarioEscolar', 'Catalogos\horarioEscolarController@index')->name('catalogos.horarioEscolar.index');

      Route::resource('indicadores', 'Catalogos\IndicadoresController', ['except' => ['show']]);
      Route::get('indicadores/detallesModal', 'Catalogos\IndicadoresController@getDetallesModal')->name('catalogos.indicadores.detallesModal');
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

    Route::group(['prefix' => 'admin'], function() {

        //Rutas para CRUD Usuarios
        Route::get('usuarios/index', 'Admin\UsuariosController@index')->name('admin.usuarios.index');
        Route::get('usuarios/_list', 'Admin\UsuariosController@getList')->name('admin.usuarios.list');
        Route::get('usuarios/create', 'Admin\UsuariosController@create')->name('admin.usuarios.create');
        Route::post('usuarios/create', 'Admin\UsuariosController@store');
        Route::get('usuarios/{user}/edit', 'Admin\UsuariosController@edit')->name('admin.usuarios.edit');
        Route::put('usuarios/{user}', 'Admin\UsuariosController@update')->name('admin.usuarios.update');
        Route::delete('usuarios/{user}', 'Admin\UsuariosController@destroy')->name('admin.usuarios.delete');

        //Rutas para mostrar y asignar accesos al usuario.
        Route::get('accesos/listForm/{user}', 'Admin\AccesosController@showListForm')->name('admin.accesos.showListForm');
        Route::put('accesos/listForm/{user}', 'Admin\AccesosController@putListForm')->name('admin.accesos.putListForm');

        //Rutas para mostrar y asignar grupos del usuario.
        Route::get('grupos/listForm/{user}', 'Admin\GruposController@showListForm')->name('admin.grupos.showListForm');
        Route::put('grupos/listForm/{user}', 'Admin\GruposController@putListForm')->name('admin.grupos.putListForm');

        //Rutas para CRUD Grupos
        Route::get('grupos/index', 'Admin\GruposController@index')->name('admin.grupos.index');
        Route::get('grupos/_list', 'Admin\GruposController@getList')->name('admin.grupos.list');
        Route::get('grupos/create', 'Admin\GruposController@create')->name('admin.grupos.create');
        Route::post('grupos/create', 'Admin\GruposController@store');
        Route::get('grupos/{grupo}/edit', 'Admin\GruposController@edit')->name('admin.grupos.edit');
        Route::put('grupos/{grupo}', 'Admin\GruposController@update')->name('admin.grupos.update');
        Route::delete('grupos/{grupo}', 'Admin\GruposController@delete')->name('admin.grupos.delete');

        //Rutas para CRUD indicadores
        Route::resource('indicadores', 'Admin\IndicadoresController', ['except' => ['show'], 'as' => 'admin']);
        Route::get('indicadores/_list', 'Admin\IndicadoresController@getList')->name('admin.indicadores.list');
    });

    // Authentication Routes...
    Route::post('logout', [
      'as' => 'logout',
      'uses' => 'Auth\LoginController@logout'
    ]);
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
