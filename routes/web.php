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

Auth::routes();

//RUTA DE PRUEBAS
Route::get('/prueba', 'ControladorPrueba@prueba')->name('prueba');

//HOME
Route::get('/home', 'HomeController@index')->name('home');

//USUARIOS VENTANAS

Route::get('/usuarios/{id}', function () {   
    return view('usuarios.show');
})->name('usuarios.show')->where('id','[0-9]+');

Route::get('/usuarios/modificar/{id}', function () {
    return view('usuarios.edit');
})->name('usuarios.edit')->where('id','[0-9]+');

Route::get('/usuarios/borrar/{id}', function () {   
    return view('usuarios.delete');
})->name('usuarios.delete')->where('id','[0-9]+');

//USUARIOS FUNCIONES

//Route::get('/inicio', 'CRUDusuariosControlador@index')->name('usuarios.index.f');

//Route::get('/usuarios/f/{id}', 'CRUDusuariosControlador@show')->name('usuarios.show.f')->where('id','[0-9]+');

Route::put('/usuarios/modificar/f/{id}', 'CRUDusuariosControlador@update')->name('usuarios.edit.f')->where('id','[0-9]+');

Route::post('/usuarios/borrar/f/{id}', 'CRUDusuariosControlador@destroy')->name('usuarios.destroy.f')->where('id','[0-9]+');

//CANCIONES

