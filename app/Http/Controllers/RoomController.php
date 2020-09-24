<?php

namespace App\Http\Controllers;

use DB;
use App\Room;
use App\Floor;
use App\ComponentPrime;
use App\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class RoomController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth')->only('create','seeRoom','edit','updateRoom','deleteRoom');
    }

    public function byFloor($id){//para consultar el id, lo utlizamos en los select dinamicos
        return Room::where('floor_id', $id)->get();
    }

    public function InpectionFloor($id){//para consultar el id, lo utlizamos en los select dinamicos        
        return $floor=Floor::with('room')->where('floor_id',$id)->get();
    }

    public function index(){
        
        $floors = Floor::all();
        return view('habitaciones/createHabitacion',compact('floors'));

    }

    public function create(Request $request){
          
        $Validate_rooms = Room::all();
        $room = new Room();
        $room->name = $request->name;
        $room->descripcion = $request->description;
        $room->floor_id = $request->floor_id;
        $room->estado_de_inspeccion = "1";
        foreach ($Validate_rooms as $Validate_room) {
            if($request->name == $Validate_room->name && $Validate_room->floor_id == $request->floor_id ){
                return redirect()->back()->with('message6','La Habitacion que intenta crear ya se encuenta creada en este piso');
            }
        }
        $room->save();        
        return redirect()->back()->with('message2','Habitacion creada correctamente');
    }

    public function seeRoom(){

        $rooms = DB::table('rooms')
                    ->join('floors','rooms.floor_id','=','floors.floor_id')
                    ->select('rooms.room_id','rooms.name','rooms.descripcion','floors.name as floor')
                    ->orderBy('floors.floor_id')
                    ->paginate(10);        

        return view('habitaciones/verHabitaciones',compact('rooms'));
    }

    public function edit($room_id){
        
        $floors = Floor::all();
        $rooms = DB::table('rooms')
                ->Join('floors','rooms.floor_id','=','floors.floor_id')
                ->select('rooms.room_id','rooms.name','rooms.descripcion','floors.floor_id','floors.name as floor')
                ->where('rooms.room_id','=',$room_id)
                ->get();
        return view('habitaciones/editarHabitacion',compact('rooms','floors'));
    }
    

    public function updateRoom(Request $request){

        $rooms = Room::find($request->room_id);
        $rooms->name = $request->name;
        $rooms->descripcion = $request->description;
        $rooms->floor_id = $request->floor_id;
        $rooms->save();

        return redirect()->route('VerHabitaciones')->with('message','Habitacion actualizada correctamente');
    }

    public function deleteRoom($Room_id){

        $Room = Room::findOrfail($Room_id);
        $Room->delete();
        return redirect()->route('VerHabitaciones')->with('message','Habitacion Eliminada correctamente');

    }    
}
