@extends('layouts.app')

@section('content')
@include('spiners/spiner')

    <div class="mb-4 d-flex justify-content-center align-items-center">               
        <h5 class="m-0 font-weight-bold text-primary ">Elemento <strong>{{$raparar[0]->nombreElemento}}</strong> Reparado </h5>       
    </div> 
    <div class="card shadow mb-4">      
        <div class="card-body table-responsive">
            <table class="table  " id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th><strong>Nombre de elemento: </strong></th>
                    <th> {{$raparar[0]->nombreElemento}}</th>
                    <th> <strong>Piso:</strong></th>
                    <th> {{$raparar[0]->nombrePiso}}</th>
                </tr>
                <tr>
                    <th><strong>Habitación: </strong></th>
                    <th> {{$raparar[0]->nombrehabitacion}}</th>
                    <th> <strong>Componente:</strong></th>
                    <th> {{$raparar[0]->NombreComponente}}</th>
                </tr>
                <tr>
                    <th><strong>Estado anterior: </strong></th>
                    <th> {{$raparar[0]->nombreEstado}}</th>
                    <th><strong>Observaciones de reparación: </strong></th>
                    <th> 
                        @if ($raparar[0]->observaciones != null)
                            {{$raparar[0]->observaciones}}
                        @else
                            <span class="text-danger"> No tiene observaciones</span>
                        @endif 
                    </th>
                </tr>
                <tr>
                    <th><strong>Fecha de reporte: </strong></th>
                    <th> {{$raparar[0]->fecha}}</th>
                    <th> <strong>Fecha de inspección:</strong></th>
                    <th> {{$raparar[0]->fecha_registro}}</th>
                </tr>
                <tr>
                    <th><strong>Bitacora: </strong></th>
                    <th> 
                        <button  class="btn btn-info btn-rounded waves-effect" onclick="BitacoraGenerada_elemento_reparado('{{$raparar[0]->id_registro}}')" data-toggle="modal" data-target="#vitacoraModal_reparado">
                            <i class="fas fa-file-alt" aria-hidden="true"></i> Bitacora
                        </button> 
                    </th>
                    <th> <strong>Responsable:</strong></th>
                    <th> {{$raparar[0]->nombreUser}}</th>
                </tr>
                <tr>                    
                    <th> <strong>Foto de reparacion:</strong></th>
                    <th> 
                        <button  class="btn btn-success btn-rounded waves-effect" onclick="foto_elemento_reparado('{{$raparar[0]->id_registro}}')" data-toggle="modal" data-target="#vitacoraModal_reparado">
                            <i class="fas fa-clone" aria-hidden="true"></i>
                        </button> 
                    </th>
                </tr>
            </table>             
        </div>
    </div>            
    

    <!--Modal vitacora elemnto reparado -->
    
    <div class="modal fade" id="vitacoraModal_reparado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
      <div class="modal-dialog" role="document">        
            <div class="modal-content">
                <div  class="modal-header">
                    <h5 id="titulo_vitacora_Or_foto" class="modal-title"> </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class=" modal-body btn float-left">
                        <div id="textVitacora_reparado">
                            
                        </div>
                    </div>                                                                  
                </div>       
            </div>
        </div>
    </div> 
@endsection
@section('scripts')
  <script src="{!! asset('js/Selects/Registros.js') !!}"></script>
@endsection

