<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\State;
use App\ComponentPrime;
use App\Component;
use App\Floor;
use App\Room;
use App\Registro;
use Carbon\Carbon;

use Illuminate\Http\Requestinput;


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
        $floors = DB::table('rooms')
                ->join('floors','rooms.floor_id','=','floors.floor_id')
                ->select('floors.floor_id','floors.name as piso')
                ->where('rooms.room_id','=',$room_id)
                ->get();
        
        return view('inspection/inspeccionComponent',compact('component_primes','rooms','floors','states'));

    }

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
    }

    public function registro(Request $request){
        
        for ($i=1; $i<=$request->input("variable"); $i++){ 
            
            $registro = new Registro();
            $registro->floor_id = $request->input("floor_id");
            $registro->room_id = $request->input("room_id");
            $registro->component_prime_id = $request->input("component_prime_id");
            $registro->component_id = $request->input("component_id$i");
            $registro->state_id = $request->input("state$i");
            $registro->observaciones = $request->input("observaciones$i");
            $registro->save();         
        }
        return redirect()->back();       
    }

    public function verRegistro(){
        $registros = Registro::all();
        $floors = Floor::all();
        return view('inspection/registroInspeccion',compact('registros','floors'));        
    }

    public function revisarRegistroxPiso($floor_id){
        
        $rooms = Room::with('registro')->where('floor_id',$floor_id)->get();
        $date = Carbon::now();
        //$date = $date->format('d-m-Y');
        $date = $date->format('l jS \\of F Y');
       
        $registros = DB::table('registros')
                    ->join('floors','registros.floor_id','=','floors.floor_id')
                    ->join('rooms','registros.room_id','=','rooms.room_id')
                    ->join('component_primes','registros.component_prime_id','=','component_primes.component_prime_id')
                    ->join('components','registros.component_id','=','components.component_id')
                    ->join('states','registros.state_id','=','states.state_id')
                    ->select('registros.id_registro','registros.created_at','floors.name as nombrePiso',
                            'rooms.room_id','rooms.name as nombreHabitacion','component_primes.component_prime_id','component_primes.name as NombreComponente',
                            'components.name as nombreElemento','states.name as nombreEstado',
                            'registros.observaciones')
                    ->orderBy('rooms.room_id')
                    ->orderBy('component_primes.component_prime_id')
                    ->where('registros.floor_id','=',$floor_id)
                    ->get();

               
        
        //return $registros;
        //$variable = Room::with('floor')->where('floor_id',$floor_id)->count();

        return view('inspection/revisarRegistroxPiso',compact('registros','rooms','date'));        

    }

    public function revisarRegistroxPisoMalas($floor_id){
        
        $rooms = Room::with(array('registro' => function($q){
            $q->where('registros.state_id',2)->orWhere('registros.state_id',5)->orWhere('registros.state_id',8);
        }))->where('floor_id',$floor_id)->get();
       
        $registros = Room::with(array('registro' => function($q){
            $q->join('floors','registros.floor_id','=','floors.floor_id');
            $q->join('rooms','registros.room_id','=','rooms.room_id');
            $q->join('components','registros.component_id','=','components.component_id');
            $q->join('component_primes','registros.component_prime_id','=','component_primes.component_prime_id');
            $q->join('states','registros.state_id','=','states.state_id');
            $q->select('registros.id_registro','floors.floor_id','rooms.room_id','component_primes.component_prime_id','component_primes.name as NombreComponente',
                                    'components.component_id','components.name as nombreElemento','states.state_id','states.name as nombreEstado',
                                    'registros.observaciones');
            $q->where('registros.state_id',2)->orWhere('registros.state_id',5)->orWhere('registros.state_id',8);
        }))->where('floor_id',$floor_id)->get();
        
        //  return $registros;
        return view('inspection/revisarRegistroxPisoMalas',compact('registros','rooms'));   

    }

         

}
