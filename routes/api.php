<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Clientes
Route::post('/insertarCliente',[ 
    'uses'=>'ClientesController@insertarCliente'
]);
Route::get('/obtenerClientes',[ 
    'uses'=>'ClientesController@obtenerClientes'
]);
Route::put('/modificarCliente/{id}',[ 
    'uses'=>'ClientesController@modificarCliente'
]);
Route::delete('/eliminarCliente/{id}',[ 
    'uses'=>'ClientesController@eliminarCliente'
]);
//Productos
Route::post('/insertarProducto',[ 
    'uses'=>'ProductosController@insertarProducto'
]);
Route::get('/obtenerProductos',[ 
    'uses'=>'ProductosController@obtenerProductos'
]);
Route::put('/modificarProducto/{id}',[ 
    'uses'=>'ProductosController@modificarProducto'
]);
Route::delete('/eliminarProducto/{id}',[ 
    'uses'=>'ProductosController@eliminarProducto'
]);
//Inventario
Route::post('/insertarInventario',[ 
    'uses'=>'InventariosController@insertarInventario'
]);
Route::get('/obtenerInventario',[ 
    'uses'=>'InventariosController@obtenerInventario'
]);
Route::put('/modificarInventario/{id}',[ 
    'uses'=>'InventariosController@modificarInventario'
]);
Route::delete('/eliminarInventario/{id}',[ 
    'uses'=>'InventariosController@eliminarInventario'
]);
//Facturas
Route::post('/insertarFactura',[ 
    'uses'=>'FacturasController@insertarFactura'
]);
Route::get('/obtenerFacturas',[ 
    'uses'=>'FacturasController@obtenerFacturas'
]);
Route::delete('/eliminarFactura/{id}',[ 
    'uses'=>'FacturasController@eliminarFactura'
]);