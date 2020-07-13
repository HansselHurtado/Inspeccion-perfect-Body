@extends('layouts.app')

@section('content')
@include('estados/mensaje')

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
                <th>Correo</th>
                <th>Perfil</th>
                <th style="text-align: center;">Editar</th>
                <th style="text-align: center;">Eliminar</th>
            
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
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
                      <td class="font-weight-bold text-primary"><a class="btn font-weight-bold text-primary"" href="">{{$users->name}}</a></td>                   
                      <td>{{$users->email}}</td>
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
                        <button class="btn btn-danger btn-icon-split" onclick="EliminarUser('{{$users->user_id}}','{{$users->name}}');"data-toggle="modal" data-target="#verUsuario">
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

  <!-- Logout Modal-->
  <div class="modal fade" id="verUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seguro que deseas eliminar a <strong id="usuario_name"></strong>?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>        
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>  

              <form id="formulario" method="POST" action="">
                @method('DELETE')
                @csrf        		
                <td style="text-align: center;"> 
                  <button type="submit" class="btn btn-danger btn-icon-split">
                    <span  aria-hidden="true">                        
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Eliminar</span>
                  </button>
                </td>
              </form>          
          </div>
        </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script src="{!! asset('js/Selects/Modal_de_Eliminar.js') !!}"></script>
@endsection