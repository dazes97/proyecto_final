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

Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
});

//LUIS AQUI ABAJO
Route::post('autenticar','Administracion\UserController@Verificar');
Route::post('token','Administracion\UserController@SubirToken');
Route::get('tarea/{id}','Usuario\TaskController@MisTareas');
//DANIEL AQUI ABAJO
Route::get('/mistareas/{id}','Usuario\MisTareasController@show');
