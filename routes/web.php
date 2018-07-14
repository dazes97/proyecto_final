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
Route::get('/home', 'HomeController@index')->name('home');

	/*Rutas de Daniel*/
Route::resource('checkout','Administracion\CheckoutController');

Route::namespace('Administracion')->group(function(){
    Route::group(['middleware' => ['admin']], function () {
    Route::resource('usuario','UserController');
    Route::resource('especialidad','SpecialtyController');
    Route::resource('suscripcion','SubscriptionController');
        Route::resource('backup','BackupController');
    });
});
/*Rutas Luis*/
Route::namespace('Archivo')->group(function () {
	Route::resource('estructura','StructureController');
	Route::resource('cargar','UpLoadController');
	Route::resource('contenido','ContentController');
	Route::resource('repositorio','RepositoryController');
	Route::resource('historial','ClinicHistoryController');
});
Route::namespace('Usuario')->group(function(){
	Route::resource('paciente','PatientController');
	Route::resource('preferencia','UserPreferenceController');
	/*Rutas de Daniel*/
	Route::resource('actividad','ActivityController');
    Route::resource('tareas','TaskController');
    Route::resource('favoritos','FavoriteController');
});

