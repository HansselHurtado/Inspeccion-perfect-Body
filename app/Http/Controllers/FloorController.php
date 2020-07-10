<?php

namespace App\Http\Controllers;

use App\User;
use App\Floor;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectorRedirectorRedirectResponseroute;

class FloorController extends Controller
{
    public function index(){
        User::authorizeRoles(1);
    	return view('pisos/createPisos');
    }

    public function create(Request $request){

        $Validate_floors = Floor::all();
        $floor = new Floor();

        $floor->name = $request->name;
        $floor->descripcion = $request->description;
        foreach ($Validate_floors as $Validate_floor) {
            if($request->name == $Validate_floor->name){
                return redirect()->back()->with('message6','El Piso que intenta crear, ya ha sido creado');
            }
        }
        $floor->save();
        return redirect()->back()->with('message','Piso creado correctamente');
    }

    public function seeFloor(){
        User::authorizeRoles(1);
        
        $floors = Floor::paginate(5);
        return view('pisos/verPisos', compact('floors'));
    }

    public function edit($floor_id){
       
        User::authorizeRoles(1);
        
        $floors = Floor::where('floor_id', '=', $floor_id)->firstOrFail();
        //$floors = Floor::find($floor_id);//esto es para que me traiga el id del piso
        return view('pisos/editarPiso', compact('floors'));
    }

    public function updateFloor(Request $request){

        $floor = Floor::where('floor_id', '=', $request->floor_id)->first();

        $floor->name = $request->name;
        $floor->descripcion = $request->description;
        
        $floor->save();
        return redirect()->route('VerPisos')->with('message','Piso actualizado correctamente');
        //return redirect()->route('VerPisos',['floor_id'=>$floor->floor_id])->with('message4','Piso actualizado correctamente');//cuando una vista tiene id


    }

    public function deleteFloor($floor_id){

        $floor = Floor::findOrfail($floor_id);
        $floor->delete();
        return redirect()->route('VerPisos')->with('message','Piso Eliminado correctamente');

    }

}
