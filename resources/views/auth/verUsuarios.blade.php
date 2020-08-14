@extends('layouts.app')

@section('content')
@include('spiners/spiner')
@include('estados/mensaje')
@include('modals/modal_user') 

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h5 class="m-0 font-weight-bold text-primary">Tabla de Uusarios </h5>  
      <a class="btn m-0 font-weight-bold text-primary" href="{{route('registro')}}"> crear Usuario</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre de Usuario</th>
                <th>Perfil</th>
                <th style="text-align: center;">Editar</th>
                <th style="text-align: center;">Eliminar</th>            
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th style="text-align: center;">Editar</th>
                <th style="text-align: center;">Eliminar</th>
              </tr>
            </tfoot>
            <tbody>
              @php( $i = 1)              
                  @foreach ($user as $users)
                  <tr>
                    <td>{{ $i }}</td>
                    <td class="font-weight-bold text-primary">
                      <a class="btn font-weight-bold text-primary" onclick="ver_usuario('{{$users->user_id}}');" data-toggle="modal" data-target="#cambiar_contrasena">{{$users->name}} {{$users->apellido}}</a>
                    </td>                   
                    <td>{{$users->role}}</td>   
                    <td style="text-align: center;">
                      <a href={{route('editarUsuario',$users->user_id)}} class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                            </span>
                          <span class="text">Editar</span>
                      </a>
                    </td>                            		
                    <td style="text-align: center;"> 
                      <button class="btn btn-danger btn-icon-split" onclick="EliminarUser('{{$users->user_id}}','{{$users->name}}','{{$users->apellido}}');"data-toggle="modal" data-target="#verUsuario">
                        <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Eliminar</span>                        
                      </button>
                    </td>                               
                  </tr> 
                @php( $i++ )               
                @endforeach                           
            </tbody>
          </table>
          {{ $user->links() }}
      </div>
    </div>
  </div>  
@endsection

