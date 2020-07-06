@extends('layouts.login')


@section('content')
        
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Registro de Usuario</h1>
            </div> 
            @include('estados/mensaje')    
            <form class="user" method="POST" action="{{route('registrar')}}">
            @csrf
                <div class="form-group"> 
                    <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder=" Nombre de Usuario">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                
                </div>
                <div  class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp"  name="email" value="{{ old('email') }}"  autocomplete="email" autofocus placeholder=" Direccion electrocnica">
            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div  class="form-group">
                    <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select" id="role_id" name="role_id" required>
                        <option value="" selected disabled>Perfil</option>
                        @foreach ($role as $roles)
                            <option value="{{$roles->role_id}}">{{$roles->name}}</option>                                                      
                        @endforeach                                   
                    </select>            
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>                
                <div class="form-group">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password"  autocomplete="new-password" placeholder="Contraseña">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Registrarse</button>
            </form>
            
            <div class="mt-3 d-flex justify-content-between align-items-center">
                <a class="btn m-0 font-weight-bold text-primary" href={{route('home')}} > Ir a Inicio</a>
                <a class="btn m-0 font-weight-bold text-primary" href={{route('verUsarios')}} > Ver Usuarios</a>
            </div>    
        </div>
    </div>
@endsection
