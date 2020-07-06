<?php

namespace App\Http\Controllers;

use DB;
use App\Component;
use App\Room;
use App\Floor;
use App\ComponentPrime;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function index(){

        $floors = Floor::all();
        $rooms = Room::all();
        $componentPrime = ComponentPrime::all();
        return view('Componentes/CreateComponentes',compact('floors','componentPrime','rooms'));
    }

    public function create(Request $request){
        
        $component =  new Component();
        $component->name = $request->name;
        $component->descripcion = $request->description;
        $component->room_id = $request->room_id;
        $component->component_prime_id = $request->component_prime_id;
        $component->save();

        return redirect()->back()->with('message3','Componente creado correctamente');
    }

    public function seeElement(){

        $component = DB::table('components')
                    ->Join('rooms','components.room_id','=','rooms.room_id')
                    ->Join('component_primes','components.component_prime_id','=','component_primes.component_prime_id')
                    ->Join('floors','rooms.floor_id','=','floors.floor_id')
                    ->select('components.component_id','components.name','components.descripcion','rooms.name as room','component_primes.name as prime','floors.name as floor')
                    ->orderBy('floors.floor_id')
                    ->paginate(5);

                    

        //dd(json_decode($component));

        return view('Componentes/VerElemento',compact('component'));

    }

    public function editElement($component_id){
        
        $rooms = Room::all();
        $floors = Floor::all();
        $components_primes = ComponentPrime::all();
        $components = DB::table('components')
                    ->Join('rooms','components.room_id','=','rooms.room_id')
                    ->Join('component_primes','components.component_prime_id','=','component_primes.component_prime_id')
                    ->Join('floors','rooms.floor_id','=','floors.floor_id')
                    ->select('components.component_id','components.name','components.descripcion','rooms.room_id','rooms.name as room','component_primes.component_prime_id','component_primes.name as prime','floors.floor_id as floor_id','floors.name as floor')
                    ->where('components.component_id','=', $component_id)
                    ->get();
        
            //return $components;
        return view('Componentes/editarElemento',compact('components','components_primes','rooms','floors'));

    }

    public function updateElement(Request $request){

        $component = Component::find($request->component_id);
        $component->component_id = $request->component_id;
        $component->name = $request->name;
        $component->descripcion = $request->description;
        $component->room_id = $request->room_id;
        $component->component_prime_id = $request->component_prime_id;
        $component->save();

        

        return redirect()->route('VerElementos')->with('message','Elemento actualizado correctamente');

    }

    public function deleteElement($component_id){

        $component = Component::findOrfail($component_id);
        $component->delete();
        return redirect()->route('VerElementos')->with('message','Elemento Eliminado correctamente');

    }
    
}
