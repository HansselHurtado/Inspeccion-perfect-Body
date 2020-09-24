@extends('layouts.app')

@section('content')
@include('spiners/spiner')

    <div class="mb-4 d-flex justify-content-center align-items-center">               
        <h5 class="m-0 font-weight-bold text-primary ">Elementos Reparados</h5>       
    </div>    
    @if(!$raparar->isEmpty())
        <div class="card shadow mb-4">      
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr style="text-align: center;" class="bg-primary text-light">
                                <th>Elemento</th>                                    
                                <th>Fecha de inspección</th>
                                <th>Habitacion</th>                            
                                <th>Revisar</th>  
                                <th>Bitacora</th>                         
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($raparar as $repara )   
                                <tr style="text-align: center;">                                            
                                    <th>{{$repara->nombreElemento}}</th>
                                    <th>{{$repara->fecha}}</th>
                                    <th>{{$repara->nombrehabitacion}}, {{$repara->nombrePiso}}</th>                                    
                                    <th style="text-align: center;">
                                        @if ($repara->estado_reparacion == 1)
                                            <span class="text-danger">No ha sido reparado</span>
                                        @else
                                            <a href="{{route('ElementverReparados',$repara->id_registro)}}" class="btn btn-info btn-rounded waves-effect">
                                                <i class="fas fa-eye" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                         
                                    </th>
                                    <th style="text-align: center;"> 
                                        <button  class="btn btn-success btn-rounded waves-effect" onclick="BitacoraGenerada_elemento_reparado('{{$repara->id_registro}}')" data-toggle="modal" data-target="#vitacoraModal_reparado">
                                            <i class="fas fa-eye" aria-hidden="true"></i>
                                        </button> 
                                    </th>
                                </tr> 
                            @endforeach                                              
                        </tbody>
                    </table>
                    {{$raparar->links()}}                 
                </div>
            </div>        
        </div>                
    @else
        <h2>NO HAY NIGUN ELEMENTO ASOCIADO</h2>
        <hr>
    @endif   
    

    <!--Modal Bitacora elemnto reparado -->
    
    <div class="modal fade" id="vitacoraModal_reparado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
      <div class="modal-dialog modal-lg " role="document">        
            <div class="modal-content">
                <div  class="modal-header">
                    <h5 id="titulo_vitacora_Or_foto" class="modal-title"> </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class=" modal-body btn float-left">
                        <div id="textVitacora_reparado" class="d-flex flex-column">
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

