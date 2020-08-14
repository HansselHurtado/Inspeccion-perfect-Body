<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//api para crear elementos con select
    



//para los componentes


//reparacion de elementos
//Route::middleware('auth:api')->get('/inspeccion/registros/reparar/{id_regsitro}','inspectionController@repararElemento');
Route::get('/pisos/{id}/habitaciones', 'RoomController@byFloor');
Route::get('/floor/{id}/habitaciones', 'RoomController@InpectionFloor');
Route::get('/habitaciones/{room_id}/inspeccionar/{component_prime_id}', 'inspectionController@InspeccionarHabitacion');
Route::get('/habitacionesInspeccionadas/{room_id}/inspeccionar/{component_prime_id}', 'inspectionController@HabitacionInspeccionada');
Route::get('/inspeccion/registros/reparar/{id_registro}','inspectionController@repararElemento');        
Route::get('/inspeccion/registros/reparar/{id_registro}/bitacora','inspectionController@repararElementoBitacora');        
Route::get('/inspeccion/registros/reparar/{id_registro}/mostrar/bitacora','inspectionController@mostrarBitacora');        

//Usuarios
Route::get('/ver-usuario/ver/{id_user}','HomeController@ver_usuario');        

//Rondas de preguntas
Route::get('/inspeccion/registros/preguntas','inspectionController@preguntas');      

 
/*Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/pisos/{id}/habitaciones', 'RoomController@byFloor');
    Route::get('/floor/{id}/habitaciones', 'RoomController@InpectionFloor');
    Route::get('/habitaciones/{room_id}/inspeccionar/{component_prime_id}', 'inspectionController@InspeccionarHabitacion');
    Route::get('/habitacionesInspeccionadas/{room_id}/inspeccionar/{component_prime_id}', 'inspectionController@HabitacionInspeccionada');
    Route::get('/inspeccion/registros/reparar/{id_regsitro}','inspectionController@repararElemento');        
});*/