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

//WELCOME

Route::get('/', function () {
    return view('welcome');
});

//RUTAS DE LOGIN

Auth::routes();

//HOME

Route::get('/home', 'HomeController@index')->name('home');

//RUTA DE PRUEBAS

Route::get('/prueba', 'ControladorPrueba@prueba')->name('prueba');

//USUARIOS VENTANAS

Route::get('/usuarios/modificar/{id}', function () {
    return view('usuarios.edit');
})->where('id', '[0-9]+');

Route::get('/usuarios/borrar/{id}', function () {
    return view('usuarios.delete'); 
})->where('id', '[0-9]+');

//USUARIOS FUNCIONES

Route::get('/usuarios/ver/{id}', 'CRUDusuariosControlador@show')->where('id','[0-9]+');

Route::put('/usuarios/modificar/f/{id}', 'CRUDusuariosControlador@update')->where('id', '[0-9]+');

Route::post('/usuarios/borrar/f/{id}', 'CRUDusuariosControlador@destroy')->where('id', '[0-9]+');

//CANCIONES

Route::get('/canciones/eliminar/{id}', function () {
    return view('canciones.delete'); 
})->where('id', '[0-9]+');

Route::get('/canciones/crear', 'ControladorCancion@create');

Route::put('/usuarios/guardar', 'ControladorCancion@store');

Route::get('/canciones/ver/{id}', 'ControladorCancion@showone')->where('id', '[0-9]+');

Route::get('/canciones/modificar/{id}', 'ControladorCancion@edit')->where('id', '[0-9]+');

Route::get('/canciones/modificar/meGusta/{idCancion}/{idUsuario}', 'ControladorCancion@meGusta')->where('id', '[0-9]+');

Route::get('/canciones/modificar/noMeGusta/{idCancion}/{idUsuario}', 'ControladorCancion@noMeGusta')->where('id', '[0-9]+');


//ETIQUETAS

Route::get('/etiqueta/index', 'ControladorEtiquetas@index');

Route::put('/etiqueta/store', 'ControladorEtiquetas@store');//put = poner, /etiqueta/store = URL, ControladorEtiquetas@store = controlador en el cual esta la función y luego del @ función la cual queres ejecutar

//

//FOOTER
Route::get('/privacidad', function () {
    return view('privacidad');
});
Route::get('/conocenos', function () {
    return view('conocenos');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/cookies', function () {
    return view('cookies');
});
