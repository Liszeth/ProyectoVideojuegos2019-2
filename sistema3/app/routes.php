<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// Con la funcion with() podemos traer todos los propietarios 
    // con sus respectivos productos. Esta funcion recibe como parametro 
    // alguna relacion que tenga el modelo al que se este llamando y 
    // la incluye en los resultados que devuelve el get()
    $users = User::with('users')->get();
    return View::make('users.inicio', array('users'=> $users));
});

Route::get('/vehiculos/create','UserController@mostrarPropietarios');

Route::post('/users/store','UserController@store');
Route::post('/users/update/{id}','UserController@update');
Route::get('/users/destroy/{id}','UserController@destroy');

Route::post('/vehiculos/store','VehiculoController@store');
Route::post('/vehiculos/update/{id}','VehiculoController@update');
Route::get('/vehiculos/destroy/{id}','VehiculoController@destroy');

Route::controller('users','UserController');
Route::controller('vehiculos','VehiculoController');
