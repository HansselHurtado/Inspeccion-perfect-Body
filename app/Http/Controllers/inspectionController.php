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
use Illuminate\Support\Facades\client;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Requestinput;


class inspectionController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->only('index','componentInspetion','enviarCorreos','cambiar_estado_elemento',
        'cambiar_estado_habitacion','cambiar_estado_registro','registro','editarRegistroReporte','verRegistro',
        'revisarRegistroxPiso','revisarRegistroxPisoMalas','buscarXfecha','buscarRegistro','buscarRegistroMalas',
        'repararMalas','verReparados'); 
        //$this->middleware('client')->only('byComponent','InspeccionarHabitacion','HabitacionInspeccionada','repararElemento');
    }
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

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
        $component_primes = ComponentPrime::with(array('component'=> function($q) use($room_id) {
            $q->where('components.room_id', $room_id);
            }))->get();

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

    public function HabitacionInspeccionada($room_id, $component_prime_id){

        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        $registros = DB::table('registros')
        ->join('components','registros.component_id','=','components.component_id')
        ->join('component_primes','registros.component_prime_id','=','component_primes.component_prime_id')
        ->join('states','registros.state_id','=','states.state_id')
        ->select('registros.id_registro','registros.floor_id','registros.room_id',
                'component_primes.component_prime_id','component_primes.name as NombreComponente',
                'components.component_id','components.name as nombreElemento','states.state_id',
                'states.name as nombreEstado',
                'registros.fecha','registros.observaciones','registros.foto')
        ->where('registros.room_id',$room_id)
        ->where('registros.component_prime_id',$component_prime_id)
        ->where('registros.fecha',$date)
        ->get();
        
        $estados = DB::table('states')
        ->join('component_primes','states.component_prime_id','=','component_primes.component_prime_id')
        ->select('states.state_id','states.name')
        ->where('states.component_prime_id',$component_prime_id)
        ->get();

        return response()->json(array("registros" => $registros,"estados" => $estados));
    }

    public function enviarCorreos($state, $component_id, $room_id){
        /*$room = Room::findOrfail($room_id);
        $elemento = Component::findOrfail($component_id);
        $estado = State::findOrfail($state);
        if($state == 2 || $state == 5 || $state == 8){
            $mensaje = "Hay que revisar algunos pisos";
            Mail::to('hansselhurtado@gmail.com')->send(new correoDeInspeccion($mensaje, $elemento->name, $room->name, $estado->name));
        }*/
    }

    public function cambiar_estado_elemento($elemento){
        $elementos = Component::where('component_id', $elemento)->first();
        $elementos->estado_de_inspeccion = 2;
        $elementos->save(); 
    }

    public function cambiar_estado_habitacion($room){
        $room = Room::where('room_id', $room)->first();
        $room->estado_de_inspeccion = 2;
        $room->save();
    }
    
    public function cambiar_estado_registro_reparacion($registro){
        $registro = Registro::where('id_registro', $registro)->first();
        $registro->estado_reparacion = 2;
        $registro->save();
    }
    public function cambiar_estado_registro_vitacora($registro){
        $registro = Registro::where('id_registro', $registro)->first();
        $registro->estado_vitacora = 2;
        $registro->save();
    }
    
    public function registro(Request $request){     

        for ($i=1; $i<=$request->input("variable"); $i++){ 
            $elemento = Component::findOrFail($request->input("component_id$i"));            
            if($elemento->estado_de_inspeccion ==  1){
                $registro = new Registro();
                if($request->hasFile("foto$i")){                
                    $file = $request->file("foto$i");               
                    $name = time().$file->getClientOriginalName();
                    $registro->foto = $name;
                    $file->move(public_path().'/evidencias/', $name);                
                }             
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
                $registro->estado_vitacora = 1;
                $registro->save();
                $this->enviarCorreos($request->input("state$i"), $request->input("component_id$i"), $request->input("room_id"));
                $this->cambiar_estado_elemento($request->input("component_id$i"));    
            }                             
        }
        $this->cambiar_estado_habitacion($request->room_id);
        return redirect()->back();     
    }

    public function editarRegistroReporte(Request $request){
        
        for ($i=1; $i<=$request->input("variable"); $i++){ 
            $registro = Registro::where('id_registro', '=', $request->input("id_registro$i"))->first();
            $registro->state_id = $request->input("state$i");
            $registro->observaciones = $request->input("observaciones$i");
            if($request->hasFile("foto$i")){                
                $file = $request->file("foto$i");               
                $name = time().$file->getClientOriginalName();
                $registro->foto = $name;
                $file->move(public_path().'/evidencias/', $name);                
            } 
            $registro->save();     
            $this->enviarCorreos($request->input("state$i"), $request->input("component_id$i"), $request->input("room_id"));
        }
        $this->cambiar_estado_habitacion($request->room_id);

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
                        'registros.observaciones','registros.fecha','registros.estado_reparacion','registros.estado_vitacora');
            $q->where('registros.fecha','=',$date);
        }))->where('floor_id',$floor_id)->get();    
        
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
                        'registros.observaciones','registros.fecha','registros.estado_reparacion','registros.estado_vitacora');
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
                                'registros.fecha','registros.foto')
                        ->where('registros.id_registro',$id_registro)->get();
    }

    public function repararElementoVitacora($id_registro){
        return $raparar = DB::table('elementos_reparados')
                        ->join('components','elementos_reparados.component_id','=','components.component_id')
                        ->join('component_primes','elementos_reparados.component_prime_id','=','component_primes.component_prime_id')
                        ->join('states','elementos_reparados.state_id','=','states.state_id')
                        ->select('elementos_reparados.id_registro','elementos_reparados.floor_id','elementos_reparados.room_id','component_primes.component_prime_id','component_primes.name as NombreComponente',
                                'components.component_id','components.name as nombreElemento','states.state_id','states.name as nombreEstado',
                                'elementos_reparados.fecha','elementos_reparados.foto','elementos_reparados.vitacora','elementos_reparados.observaciones')
                        ->where('elementos_reparados.id_registro',$id_registro)->get();
    }


    public function repararMalas(Request $request){
        $reparado = ElementosReparados::where('id_registro',$request->input("id_registro"))->first();
        if($reparado == null){
            $reparar = new ElementosReparados();
            if($request->hasFile("evidencia_reparada")){                
                $file = $request->file("evidencia_reparada");               
                $name = time().$file->getClientOriginalName();
                $reparar->foto = $name;
                $file->move(public_path().'/evidencias_de_reparacion/', $name);                
            } 
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
        }else{
            if($request->hasFile("evidencia_reparada")){                
                $file = $request->file("evidencia_reparada");               
                $name = time().$file->getClientOriginalName();
                $reparado->foto = $name;
                $file->move(public_path().'/evidencias_de_reparacion/', $name);                
            } 
            $reparado->observaciones = $request->input("Observaciones");
            $reparado->save();
        } 
        $this->cambiar_estado_registro_reparacion($request->id_registro);
        return redirect()->back();  
    }
    
    public function repararMalasVitacora(Request $request){
        $reparado = ElementosReparados::where('id_registro',$request->input("id_registro"))->first();
        if($reparado == null){
            $reparar = new ElementosReparados();
            $reparar->vitacora = $request->vitacora;
            $reparar->id_registro = $request->input("id_registro");
            $reparar->floor_id = $request->input("floor_id");
            $reparar->room_id = $request->input("room_id");
            $reparar->component_prime_id = $request->input("component_prime_id");
            $reparar->component_id = $request->input("component_id");
            $reparar->state_id = $request->input("state_id");
            $date = Carbon::now()->locale('es');
            $dat = $date->isoFormat('LLLL');
            $reparar->fecha = $dat;
            $reparar->user_id = auth()->id();
            $reparar->save();
        }else{
            $reparado->vitacora = $request->vitacora;
            $reparado->save();
        }
        $this->cambiar_estado_registro_vitacora($request->id_registro);
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
                    ->join('registros','elementos_reparados.id_registro','=','registros.id_registro')
                    ->select('elementos_reparados.id_elemento_reparado','elementos_reparados.floor_id','elementos_reparados.room_id',
                            'elementos_reparados.user_id','users.name as nombreUser','floors.name as nombrePiso','rooms.name as nombrehabitacion',
                            'component_primes.component_prime_id','component_primes.name as NombreComponente',
                            'components.component_id','components.name as nombreElemento','states.state_id','states.name as nombreEstado',
                            'elementos_reparados.id_registro','elementos_reparados.fecha','elementos_reparados.observaciones','registros.created_at as fecha_registro')
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
