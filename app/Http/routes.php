<?php


Route::get('/', function () {    
	return view('auth/login');
});


Route::group(['middleware'=>['auth','admin'],'prefix'=>'admin'],function()
{

	Route::get('/', function () {    
		return redirect()->to('admin/almacen-venta');
	});

	 //ruta de categoria
Route::get('almacen-categoria', 'admin\CategoriaController@index');
Route::get('almacen-categoria-crear', 'admin\CategoriaController@create');
//Route::get('almacen-editar', 'CategoriaController@edit');
Route::get('almacen-categoria-editar/{id}',['uses'=> 'admin\CategoriaController@edit', 'as'=> 'almacen-editar.index']);
Route::delete('almacen-categoria-borrar/{id}', 'admin\CategoriaController@destroy');
Route::post('almacen-categoria-store', 'admin\CategoriaController@store');
Route::patch('almacen-categoria-update/{id}',['uses'=> 'admin\CategoriaController@update', 'as'=> 'almacen-categoria-update']);

//Route::resource('almacen/categoria','CategoriaController');

//ruta de articulo
//Route::resource('almacen/articulo','ArticuloController');
Route::get('almacen-articulo', 'admin\ArticuloController@index');
Route::get('almacen-articulo-crear', 'admin\ArticuloController@create');
Route::get('almacen-articulo-editar/{id}', 'admin\ArticuloController@edit');
Route::delete('almacen-articulo-borrar/{id}', 'admin\ArticuloController@destroy');
Route::patch('almacen-articulo-update', 'admin\ArticuloController@update');
//Route::post('almacen-articulo-store', 'ArticuloController@store');
Route::post('almacen-articulo-store',['uses'=> 'admin\ArticuloController@store', 'as'=> 'almacen-articulo-store']);

//ruta de cliente
//Route::resource('ventas/cliente','ClienteController');
Route::get('almacen-cliente', 'admin\ClienteController@index');
Route::get('almacen-cliente-crear', 'admin\ClienteController@create');
Route::get('almacen-cliente-editar/{id}', 'admin\ClienteController@edit');
Route::delete('almacen-cliente-borrar/{id}', 'admin\ClienteController@destroy');
Route::post('almacen-cliente-store', 'admin\ClienteController@store');
Route::patch('almacen-cliente-update/{id}',['uses'=> 'admin\ClienteController@update', 'as'=> 'almacen-cliente-update']);


//ruta del proveedor
//Route::resource('compras/proveedor','ProveedorController');
Route::get('almacen-proveedor', 'admin\ProveedorController@index');
Route::get('almacen-proveedor-crear', 'admin\ProveedorController@create');
Route::get('almacen-proveedor-editar/{id}', 'admin\ProveedorController@edit');
Route::delete('almacen-proveedor-borrar/{id}', 'admin\ProveedorController@destroy');
Route::post('almacen-proveedor-store', 'admin\ProveedorController@store');
Route::patch('almacen-proveedor-update/{id}',['uses'=> 'admin\ProveedorController@update', 'as'=> 'almacen-proveedor-update']);

//ruta del ingreso almacen
//Route::resource('compras/ingreso','IngresoController');
Route::get('almacen-ingreso', 'admin\IngresoController@index');
Route::get('almacen-ingreso-crear', 'admin\IngresoController@create');
Route::get('almacen-ingreso-mostrar/{id}', 'admin\IngresoController@show');
Route::get('almacen-ingreso-editar', 'admin\IngresoController@edit');
Route::delete('almacen-ingreso-borrar', 'admin\IngresoController@destroy');
Route::post('almacen-ingreso-store', 'admin\IngresoController@store');

//ruta de venta
//Route::resource('ventas/venta','VentaController');
Route::get('almacen-venta', 'admin\VentaController@index');
Route::get('almacen-venta-crear', 'admin\VentaController@create');
Route::get('almacen-venta-mostrar/{id}', 'admin\VentaController@show');
Route::get('almacen-venta-editar', 'admin\VentaController@edit');
Route::get('almacen-venta-borrar/{id}', 'admin\VentaController@destroy');
Route::post('almacen-venta-store', 'admin\VentaController@store');

//ruta de venta
//Route::resource('reporte/kardex','ReporteController');
 Route::get('reporte-kardex', 'admin\ReporteController@index');

//Route::resource('seguridad/usuario','UsuarioController');
Route::get('seguridad-usuario', 'admin\UsuarioController@index');
Route::get('seguridad-usuario-crear', 'admin\UsuarioController@create');
Route::get('seguridad-usuario-editar/{id}', 'admin\UsuarioController@edit');
Route::delete('seguridad-usuario-borrar/{id}', 'admin\UsuarioController@destroy');
Route::post('seguridad-usuario-store', 'admin\UsuarioController@store');
Route::patch('seguridad-usuario-update',['uses'=> 'admin\UsuarioController@update', 'as'=> 'seguridad-usuario-update']);


});




Route::group(['middleware'=>['auth','responsable'],'prefix'=>'responsable'],function()
{
	 
	Route::get('/', function () {    
		return redirect()->to('responsable/almacen-venta');
	});

	//ruta de categoria
Route::get('almacen-categoria', 'auxiliar\CategoriaController@index');
Route::get('almacen-categoria-crear', 'auxiliar\CategoriaController@create');
Route::get('almacen-editar', 'auxiliar\CategoriaController@edit');

Route::post('almacen-categoria-store', 'auxiliar\CategoriaController@store');
Route::patch('almacen-categoria-update/{id}',['uses'=> 'auxiliar\CategoriaController@update', 'as'=> 'almacen-categoria-update']);

//Route::resource('almacen/categoria','CategoriaController');

//ruta de articulo
//Route::resource('almacen/articulo','ArticuloController');
Route::get('almacen-articulo', 'auxiliar\ArticuloController@index');
Route::get('almacen-articulo-crear', 'auxiliar\ArticuloController@create');

Route::patch('almacen-articulo-update', 'auxiliar\ArticuloController@update');
//Route::post('almacen-articulo-store', 'ArticuloController@store');
Route::post('almacen-articulo-store',['uses'=> 'auxiliar\ArticuloController@store', 'as'=> 'almacen-articulo-store']);

//ruta de cliente
//Route::resource('ventas/cliente','ClienteController');
Route::get('almacen-cliente', 'auxiliar\ClienteController@index');
Route::get('almacen-cliente-crear', 'auxiliar\ClienteController@create');
//Route::get('almacen-cliente-editar/{id}', 'ClienteController@edit');
//Route::delete('almacen-cliente-borrar/{id}', 'ClienteController@destroy');
Route::post('almacen-cliente-store', 'auxiliar\ClienteController@store');
Route::patch('almacen-cliente-update/{id}',['uses'=> 'auxiliar\ClienteController@update', 'as'=> 'almacen-cliente-update']);


//ruta del proveedor
//Route::resource('compras/proveedor','ProveedorController');
Route::get('almacen-proveedor', 'auxiliar\ProveedorController@index');
Route::get('almacen-proveedor-crear', 'auxiliar\ProveedorController@create');

Route::post('almacen-proveedor-store', 'auxiliar\ProveedorController@store');
Route::patch('almacen-proveedor-update/{id}',['uses'=> 'auxiliar\ProveedorController@update', 'as'=> 'almacen-proveedor-update']);

//ruta del ingreso almacen
//Route::resource('compras/ingreso','IngresoController');
Route::get('almacen-ingreso', 'auxiliar\IngresoController@index');
Route::get('almacen-ingreso-crear', 'auxiliar\IngresoController@create');
Route::get('almacen-ingreso-mostrar/{id}', 'auxiliar\IngresoController@show');

Route::post('almacen-ingreso-store', 'auxiliar\IngresoController@store');

//ruta de venta
//Route::resource('ventas/venta','VentaController');
Route::get('almacen-venta', 'auxiliar\VentaController@index');
Route::get('almacen-venta-crear', 'auxiliar\VentaController@create');
Route::get('almacen-venta-mostrar/{id}', 'auxiliar\VentaController@show');

Route::post('almacen-venta-store', 'auxiliar\VentaController@store');

//ruta de venta
//Route::resource('reporte/kardex','ReporteController');
 Route::get('reporte-kardex', 'auxiliar\ReporteController@index');

//Route::resource('seguridad/usuario','UsuarioController');
Route::get('seguridad-usuario', 'auxiliar\UsuarioController@index');
Route::get('seguridad-usuario-crear', 'auxiliar\UsuarioController@create');

Route::post('seguridad-usuario-store', 'auxiliar\UsuarioController@store');
Route::patch('seguridad-usuario-update',['uses'=> 'auxiliar\UsuarioController@update', 'as'=> 'seguridad-usuario-update']);


});

//Rutas para el manejo de login y usuarios
Route::auth();

Route::get('omar', 'admin\PruebaController@index');