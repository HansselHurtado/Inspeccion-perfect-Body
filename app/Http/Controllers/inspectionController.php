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
use App\User;
use Carbon\Carbon;
use App\ElementosReparados;
use App\Mail\correoDeInspeccion;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Auth;


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
                ->select('rooms.room_id','rooms.name','rooms.estado_de_inspeccion','floors.name as floor')
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
            $date = Carbon::now();
            $date = $date->format('Y-m-d');
            $registro->fecha = $date;
            $registro->estado_reparacion = 1;
            $registro->save();         
        }
        $room = Room::where('room_id', '=', $request->room_id)->first();
        $room->estado_de_inspeccion = 2;
        $room->save();        
        return redirect()->back();       
    }

    public function verRegistro(){
        $registros = Registro::all();
        $floors = Floor::all();
        return view('inspection/registroInspeccion',compact('registros','floors'));        
    }

    public function revisarRegistroxPiso($floor_id){
        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        return $this->buscarRegistro($floor_id,$date);
    }

    public function revisarRegistroxPisoMalas($floor_id){
        $date = Carbon::now();
        $date = $date->format('Y-m-d'); 
        return $this->buscarRegistroMalas($floor_id, $date);
    }

    public function buscarXfecha(Request $request, $floor_id){
        $date = $request->fecha;
        return $this->buscarRegistro($floor_id, $date);
    }

    public function buscarXfechaMalas(Request $request, $floor_id){
        $date = $request->fecha;
        return $this->buscarRegistroMalas($floor_id, $date);
    }

    public function buscarRegistro($floor_id, $date){
        $registros = Room::with(array('registro' => function($q) use($date){
            $q->join('floors','registros.floor_id','=','floors.floor_id');
            $q->join('rooms','registros.room_id','=','rooms.room_id');
            $q->join('components','registros.component_id','=','components.component_id');
            $q->join('component_primes','registros.component_prime_id','=','component_primes.component_prime_id');
            $q->join('states','registros.state_id','=','states.state_id');
            $q->select('registros.id_registro','floors.floor_id','rooms.room_id','component_primes.component_prime_id','component_primes.name as NombreComponente',
                        'components.component_id','components.name as nombreElemento','states.state_id','states.name as nombreEstado',
                        'registros.observaciones','registros.fecha','registros.estado_reparacion');
            $q->where('registros.fecha','=',$date);
        }))->where('floor_id',$floor_id)->get();    
        
        //return $registros;
        return view('inspection/revisarRegistroxPiso',compact('registros','date'));
    }       
    
    public function buscarRegistroMalas($floor_id, $date){   
        $registros = Room::with(array('registro' => function($q) use($date){
            $q->join('floors','registros.floor_id','=','floors.floor_id');
            $q->join('rooms','registros.room_id','=','rooms.room_id');
            $q->join('components','registros.component_id','=','components.component_id');
            $q->join('component_primes','registros.component_prime_id','=','component_primes.component_prime_id');
            $q->join('states','registros.state_id','=','states.state_id');
            $q->select('registros.id_registro','floors.floor_id','rooms.room_id','component_primes.component_prime_id','component_primes.name as NombreComponente',
                        'components.component_id','components.name as nombreElemento','states.state_id','states.name as nombreEstado',
                        'registros.observaciones','registros.fecha','registros.estado_reparacion');
            $q->where('registros.fecha','=',$date)->whereIn('registros.state_id',[2,5,8]);//whereIn se utliza como el metodo OR
        }))->where('floor_id',$floor_id)->get();
        
        return view('inspection/revisarRegistroxPisoMalas',compact('registros','date'));  
    }

    public function repararElemento($id_registro){
        return $raparar = DB::table('registros')
                        ->join('components','registros.component_id','=','components.component_id')
                        ->join('component_primes','registros.component_prime_id','=','component_primes.component_prime_id')
                        ->join('states','registros.state_id','=','states.state_id')
                        ->select('registros.id_registro','registros.floor_id','registros.room_id','component_primes.component_prime_id','component_primes.name as NombreComponente',
                                'components.component_id','components.name as nombreElemento','states.state_id','states.name as nombreEstado',
                                'registros.fecha')
                        ->where('registros.id_registro',$id_registro)->get();
    }

    public function repararMalas(Request $request){
        
        $reparar = new ElementosReparados();
        $reparar->id_registro = $request->input("id_registro");
        $reparar->floor_id = $request->input("floor_id");
        $reparar->room_id = $request->input("room_id");
        $reparar->component_prime_id = $request->input("component_prime_id");
        $reparar->component_id = $request->input("component_id");
        $reparar->state_id = $request->input("state_id");
        $reparar->observaciones = $request->input("Observaciones");
        $date = Carbon::now()->locale('es');
        $dat = $date->isoFormat('LLLL');
        $reparar->fecha = $dat;
        $reparar->user_id = auth()->id();
        $reparar->save();

        $registro = Registro::where('id_registro', '=', $request->id_registro)->first();
        $registro->estado_reparacion = 2;
        $registro->save();
        return redirect()->back();  
    }

    public function verReparados(){ 

        $raparar = DB::table('elementos_reparados')
                        ->join('users','elementos_reparados.user_id','=','users.user_id')
                        ->join('floors','elementos_reparados.floor_id','=','floors.floor_id')
                        ->join('rooms','elementos_reparados.room_id','=','rooms.room_id')                        
                        ->join('components','elementos_reparados.component_id','=','components.component_id')
                        ->join('component_primes','elementos_reparados.component_prime_id','=','component_primes.component_prime_id')
                        ->join('states','elementos_reparados.state_id','=','states.state_id')
                        ->select('elementos_reparados.id_elemento_reparado','elementos_reparados.floor_id','elementos_reparados.room_id',
                                'elementos_reparados.user_id','users.name as nombreUser','floors.name as nombrePiso','rooms.name as nombrehabitacion',
                                'component_primes.component_prime_id','component_primes.name as NombreComponente',
                                'components.component_id','components.name as nombreElemento','states.state_id','states.name as nombreEstado',
                                'elementos_reparados.fecha','elementos_reparados.observaciones')
                        ->orderBy('elementos_reparados.id_elemento_reparado','desc')->paginate(7);
                        
                        
        return view('inspection/elementosReparados',compact('raparar'));  

    }

   /* public function contact(Request $request){
        $subject = "Un nuevo elemento por reparar";
        $for = "hansselhurtado@gmail.com";
        Mail::send('email', function($msj) use($subject,$for){
            $msj->from("inspeccion.perfectbody@gmail.com","Inspector");
            $msj->subject($subject);
            $msj->to($for);
        });
        return redirect()->back();
    }*/

}
