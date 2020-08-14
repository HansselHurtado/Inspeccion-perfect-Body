@extends('layouts.app')

@section('content')
@include('spiners/spiner')
@include('estados/mensaje')    


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary"> Editar usuario</h2>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{route('updateUser')}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <table class="table  " id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th><strong>Nombre:</strong></th>
                        <th>
                            <div class="form-group"> 
                                <input style="display: none;" name="user_id" value="{{$user[0]->user_id}}" type="text">
                                <input style="border-radius: 20px; height: 50px;" id="name" type="text" class="form-control form-control-user" name="name" value="{{$user[0]->name}}">
                            </div>
                        </th>
                        <th><strong>Apellidos:</strong></th>
                        <th>
                            <div class="form-group"> 
                                <input style="border-radius: 20px; height: 50px;" id="apellido" type="text" class="form-control form-control-user " name="apellido"value="{{$user[0]->apellido}}">              
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th><strong>Correo electronico:</strong></th>
                        <th>
                            <div  class="form-group">
                                <input style="border-radius: 20px; height: 50px;" type="email" class="form-control form-control-user " id="email" aria-describedby="emailHelp"  name="email" value="{{$user[0]->email}}" readonly>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </th>
                        <th><strong>Nombre de usuario:</strong></th>
                        <th>
                            <div class="form-group"> 
                                <input style="border-radius: 20px; height: 50px;" id="username" type="text" class="form-control form-control-user " name="username" value="{{$user[0]->username}}"  readonly>
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th><strong>Role</strong></th>
                        <th>
                            <div  class="form-group">
                                <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select"  name="role_id" required>
                                    <option value="{{$user[0]->roleId}}" >{{$user[0]->role}}</option>
                                    @foreach ($role as $roles)
                                        <option value="{{$roles->role_id}}">{{$roles->name}}</option>
                                    @endforeach                                 
                                </select>
                            </div>  
                        </th>
                        <th></th>
                        <th></th>                        
                    </tr>    
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <button style="border-radius: 20px; height: 50px;" type="submit" class="btn btn-primary btn-user btn-block">Editar</button>
                        </th>
                    </tr>    
                    <tr>
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                        </div>                 
                    </tr>   
                </table>
            </form>
            <div class="mt-3 d-flex justify-content-between align-items-center">
                <a class="btn m-0 font-weight-bold text-primary" href={{route('verUsarios')}} > Ver Usuarios</a>
            </div>
        </div>
    </div>
@endsection

