<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\State;
use App\ComponentPrime;
use App\Component;
use App\Floor;
use App\Room;


class inspectionController extends Controller
{

    public function byComponenet($id){

        $component =  ComponentPrime::find($id);
        return response()->json($component);
    }
    
    public function index(){

        $floors = Floor::all();
        $components = Component::all();
        $rooms = DB::table('rooms')
                ->join('floors','rooms.floor_id','=','floors.floor_id')
                ->select('rooms.room_id','rooms.name','floors.name as floor')
                ->orderBy('floors.floor_id')
                ->paginate(5);
    	return view ('inspection/inspection',compact('rooms','components','floors'));
    }

    public function componentInspetion($room_id){

        $rooms = Room::findOrFail($room_id);
        $component_primes = ComponentPrime::all();
        $states = State::all();
        $floors_name =DB::table('rooms')
                ->join('floors','rooms.floor_id','=','floors.floor_id')
                ->select('floors.name as piso')
                ->where('room_id','=',$room_id)
                ->get();
        
        return view('inspection/inspeccionComponent',compact('component_primes','rooms','floors_name','states'));

    }

    /*public static function seeInspection($component_prime_id){
         
        return $component_prime_id;
        $rooms = Room::with(array('component'=>function($element){
            $element->with(array('component_prime'=>function($component_prime){
                $component_prime->with('state');
            }));
        }))->where('room_id',$room_id)->get();
        
        return $rooms;
        //return view('inspection/inspeccionar',compact('rooms'));
    }*/

    public function InspeccionarHabitacion($room_id, $component_prime_id){       

        $rooms = Room::findOrFail($room_id);
        
        //Consulta para traer un array de los componentes y elementos de el 
        $prime = ComponentPrime::with(array('state', 'component' => function($q) use($room_id) {
                                $q->where('components.room_id', $room_id);
                                }))
                                ->where('component_prime_id',$component_prime_id)->get();


        /*$rooms = Room::with(array('component'=>function($element) use ($component_prime_id){
            $element->with(['component_prime'=>function($component_prime) use ($component_prime_id){
                $component_prime->with('state')->where('component_prime_id', $component_prime_id);
            }]);
        }))->where('room_id',$room_id)->get();*/
        
       
        return response()->json($prime);
        //return response()->json($rooms);


    }
}
