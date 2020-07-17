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
Route::get('/pisos/{id}/habitaciones', 'RoomController@byFloor');

Route::get('/floor/{id}/habitaciones', 'RoomController@InpectionFloor');


//para los componentes
Route::get('/habitaciones/{room_id}/inspeccionar/{component_prime_id}', 'inspectionController@InspeccionarHabitacion');

//reparacion de elementos
Route::get('/inspeccion/registros/reparar/{id_regsitro}','inspectionController@repararElemento');
