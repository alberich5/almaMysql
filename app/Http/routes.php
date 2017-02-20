<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//ruta de categoria
Route::resource('almacen/categoria','CategoriaController');

//ruta de articulo
Route::resource('almacen/articulo','ArticuloController');

//ruta de cliente
Route::resource('ventas/cliente','ClienteController');

//ruta del proveedor
Route::resource('compras/proveedor','ProveedorController');

//ruta del ingreso almacen
Route::resource('compras/ingreso','IngresoController');
