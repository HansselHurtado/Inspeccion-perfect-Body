<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




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
    return view('auth/login');
});


//ruta de inicio
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/registro','HomeController@registerUser')->name('registro');
Route::post('/home/registro/','HomeController@registroNuevo')->name('registrar');
Route::get('/ver-usuarios','HomeController@ver_usuarios')->name('verUsarios');
Route::get('/ver-usuarios/editar/{role_id}','HomeController@edit')->name('editarUsuario');
Route::put('/ver-usuarios/editar','HomeController@updateUser')->name('updateUser');
Route::delete('/ver-usuarios/eliminar/{user_id}','HomeController@delet')->name('EliminarUsuario');



Route::group(['namespace' => 'Auth'], function () {

    //autenticacion
    Route::post('login', 'LoginController@login'); 
    Route::post('logout', 'LoginController@logout');
});
Auth::routes();

//ruta de inspeccion
Route::get('/inspeccion','inspectionController@index')->name('inspeccion');
Route::get('/inspeccion/inspeccionar/{room_id}','inspectionController@componentInspetion')->name('inspeccionComponentes');
Route::post('/inspeccion/inspeccionar','inspectionController@registro')->name('registroReporte');
Route::get('/inspeccion/registros','inspectionController@verRegistro')->name('registros');
Route::get('/inspeccion/registros/{floor_id}','inspectionController@revisarRegistroxPiso')->name('revisarRegistroxPiso');
Route::get('/inspeccion/registros/malas/{floor_id}','inspectionController@revisarRegistroxPisoMalas')->name('revisarRegistroxPisoMalas');



//ruta de ver y crear pisos
Route::get('/CrearPiso','FloorController@index')->name('Pisos');
Route::post('/CrearPiso','FloorController@create')->name('createFloor');
Route::get('/Ver-Pisos','FloorController@seeFloor')->name('VerPisos');
Route::get('/Ver-Pisos/editar/{floor_id}','FloorController@edit')->name('editar');
Route::put('/Ver-Pisos/editar','FloorController@updateFloor')->name('updateFloors');
Route::delete('/Ver-Piso/eliminar/{floor_id}','FloorController@deleteFloor')->name('EliminarPiso');


//rutas de ver y crear habitaciones
Route::get('/CrearHabitacion','RoomController@index')->name('Habitaciones');
Route::post('/CrearHabitacion','RoomController@create')->name('createHabitacion');
Route::get('/Ver-Habitaciones','RoomController@seeRoom')->name('VerHabitaciones');
Route::get('/Ver-Habitaciones/editar/{room_id}','RoomController@edit')->name('editarHabitacion');
Route::put('/Ver-Habitaciones/editar','RoomController@updateRoom')->name('updateRooms');
Route::delete('/Ver-Habitaciones/eliminar/{room_id}','RoomController@deleteRoom')->name('EliminarHabitacion');



//rutas de ver y crear Elementos
Route::get('/CrearComponentes','ComponentController@index')->name('Componentes');
Route::post('/CrearComponentes','ComponentController@create')->name('createComponentes');
Route::get('/Ver-Elementos','ComponentController@seeElement')->name('VerElementos');
Route::get('/Ver-Elementos/editar/{component_id}','ComponentController@editElement')->name('editarElemento');
Route::put('/Ver-Elementos/editar','ComponentController@updateElement')->name('updateElemento');
Route::delete('/Ver-Elementos/eliminar/{component_id}','ComponentController@deleteElement')->name('EliminarElemento');




