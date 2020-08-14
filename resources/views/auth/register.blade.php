@extends('layouts.app')


@section('content')
@include('spiners/spiner')
@include('estados/mensaje')    


<div class="mb-4 d-flex justify-content-center align-items-center">               
    <h5 class="m-0 font-weight-bold text-primary ">Registrar nuevo usuario </h5>       
</div> 
<div class="card shadow mb-4">      
    <div class="card-body table-responsive">
        <form class="" method="POST" action="{{route('registrar')}}">
            @csrf
            <table class="table  " id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th><strong>Nombre:</strong></th>
                    <th>
                        <div class="form-group"> 
                            <input style="border-radius: 20px; height: 50px;" id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder=" Escriba sus nombres">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                
                        </div>
                    </th>
                    <th><strong>Apellidos:</strong></th>
                    <th>
                        <div class="form-group"> 
                            <input style="border-radius: 20px; height: 50px;" id="apellido" type="text" class="form-control form-control-user @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}"  autocomplete="apellido" autofocus placeholder=" Escriba sus apellidos">
                            @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                
                        </div>
                    </th>
                </tr>
                <tr>
                    <th><strong>Correo electronico:</strong></th>
                    <th>
                        <div  class="form-group">
                            <input style="border-radius: 20px; height: 50px;" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp"  name="email" value="{{ old('email') }}"  autocomplete="email" autofocus placeholder=" Direccion electrocnica">
                    
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </th>
                    <th><strong>Nombre de usuario:</strong></th>
                    <th>
                        <div class="form-group"> 
                            <input style="border-radius: 20px; height: 50px;" id="username" type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus placeholder=" Escriba el nombre de usuario">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                
                        </div>
                    </th>
                </tr>
                <tr>
                    <th><strong>Role</strong></th>
                    <th>
                        <div  class="form-group">
                            <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select"  name="role_id" required>
                                <option value="" selected disabled>Perfil</option>
                                @foreach ($role as $roles)
                                    <option value="{{$roles->role_id}}">{{$roles->name}}</option>                                                      
                                @endforeach                                   
                            </select>
                        </div>  
                    </th>
                    <th><strong>Contraseña</strong></th>
                    <th>
                        <div class="form-group">
                            <input style="border-radius: 20px; height: 50px;" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password"  autocomplete="new-password" placeholder="Contraseña">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </th>
                </tr>    
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <button style="border-radius: 20px; height: 50px;" type="submit" class="btn btn-primary btn-user btn-block">Registrar</button>
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
