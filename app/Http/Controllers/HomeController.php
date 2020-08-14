<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateUserRequest;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('ver_usuario');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home/index');
    }

    public function registerUser(){       

        User::authorizeRoles(1);
        $role = Role::all();
        return view('auth/register',compact('role'));
    }

    public function registroNuevo(ValidateUserRequest $request)
    { 
        
        $user = new User();
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->back()->with('message','Usuario creado correctamente');
        
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    
    public function ver_usuarios(Request $request){

        User::authorizeRoles(1);
        //user()->authorizeRoles(['admin', ]);

        $user = DB::table('users')
                    ->join('roles','users.role_id','=','roles.role_id')
                    ->select('users.user_id','users.name','users.apellido','users.email','roles.name as role')
                    ->orderBy('users.user_id')
                    ->paginate(5);
        return view('auth/verusuarios',compact('user'));
        
    }

    public function ver_usuario($id_user){
        return $user = DB::table('users')
                    ->join('roles','users.role_id','=','roles.role_id')
                    ->select('users.user_id','users.name','users.username','users.apellido','users.email','roles.name as role')
                    ->where('users.user_id',$id_user)
                    ->get();
    }

    public function cambiar_contrasena(Request $request){
        User::authorizeRoles(1);
        $user = User::findOrFail($request->user_id); 
        if($request->password == null && $request->confirme_password == null) {
            return redirect()->route('verUsarios');
        }
        if($user->user_id == 1){
            return redirect()->route('verUsarios')->with('message6',' No se puede Cambiar la contraseña al Administrador');            
        }        
        if($request->password == $request->confirme_password){
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('verUsarios')->with('message','Contraseña Actulizada correctamente');
        }else{            
            return redirect()->route('verUsarios')->with('message6','Las contraseñas no coinciden');
        }
    }

    public function edit($id){
        
        User::authorizeRoles(1);
        $role = Role::all();
        $user = DB::table('users')
                ->join('roles','users.role_id','=','roles.role_id')
                ->select('users.user_id','users.name','users.username','users.password',
                'users.email','users.apellido','roles.role_id as roleId','roles.name as role')
                ->where('users.user_id','=', $id)
                ->get();
        return view('auth/editUser', compact('user','role'));
    }

    public function updateUser(Request $request){

        $user = User::where('user_id', $request->user_id)->first();
        if($user->user_id == 1){
            return redirect()->route('verUsarios')->with('message6',' No se puede Editar el Usuario Administrador');            
        } 
        $user->name = $request->name;
        $user->apellido = $request->apellido;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;       
        $user->save();
        return redirect()->route('verUsarios')->with('message','Usuario actualizado correctamente');
        //return redirect()->route('VerPisos',['floor_id'=>$floor->floor_id])->with('message4','Piso actualizado correctamente');//cuando una vista tiene id

    }

    public function delet($id){
       
        User::authorizeRoles(1);
        $user = User::findOrfail($id);
        if($user->user_id == 1){
            return redirect()->route('verUsarios')->with('message6',' No se puede Elimnar el Usuario Administrador');            
        } 
        $user->delete();
        return redirect()->route('verUsarios')->with('message','Usuario  Eliminado correctamente');
    }


}
