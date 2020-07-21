@extends('layouts.app')

@section('content')
@include('estados/mensaje')
    @php($i=0)
    @foreach ($registros as $registro )    
        @if(!$registro->registro->isEmpty())            
            @php($i++)
        @endif
    @endforeach
    @if($i > 0)
        <div class="mb-4 d-flex justify-content-center align-items-center">               
            <h5 class="m-0 font-weight-bold text-primary ">Inspecciones Malas {{$date}}</h5>       
        </div>
        @foreach ($registros as $registro )
            @if(!$registro->registro->isEmpty())
                <div class="card shadow mb-4">              
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary">{{$registro->name}} </h5>
                        <form method="POST" action={{ route('buscarXfechaMalas',$registro->floor_id) }}>
                            @csrf
                            <div class="  d-flex justify-content-between align-items-center">
                                <label class="ml-25" for=""> Buscar por fecha</label>                      
                                <input name="fecha" class="form-control form-control-user w-75" type="date" required>
                                <button class="btn btn-primary " type="submit">buscar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <h6 class="m-0 font-weight-bold text-primary"> Fecha de Inspeccion: {{$date}}</h6>  
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-primary text-light">
                                        <th>Elemento</th>
                                        <th style="text-align: center;" >Componente</th>
                                        <th style="text-align: center;" >Observaciones</th>
                                        <th style="text-align: center;" >Estado / Tiene</th>
                                        <th style="text-align: center;" >Reparar</th>
                                    </tr>
                                </thead>
                                <tbody>                               
                                    @foreach($registro->registro as $registros )
                                        <tr>                                            
                                            <th>{{$registros->nombreElemento}}</th>
                                            <th style="text-align: center;" >{{$registros->NombreComponente}}</th>
                                            <th style="text-align: center;" >
                                                @if(strlen($registros->observaciones)==0)
                                                    <span>- - -</span>
                                                @else
                                                    {{$registros->observaciones}}
                                                @endif
                                            </th>
                                            <th style="text-align: center;">
                                                @if($registros->nombreEstado ==  "Bueno")
                                                    <a  title="Bueno" href="#" class="btn btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                @elseif($registros->nombreEstado ==  "Malo")
                                                    <a title="Malo" href="#" class="btn btn-danger btn-circle" >
                                                        <i   class="fas fa-exclamation-triangle"></i>
                                                    </a>
                                                @else
                                                    {{$registros->nombreEstado}}
                                                @endif
                                            </th> 
                                            <th style="text-align: center;">
                                                @if($registros->nombreEstado ==  "No" || $registros->nombreEstado ==  "Malo" || $registros->nombreEstado ==  "Sucio")
                                                    @if($registros->estado_reparacion == 1)                                                    
                                                        <button  class="btn btn-outline-success btn-rounded waves-effect" onclick="RepararElemento('{{$registros->id_registro}}')" data-toggle="modal" data-target="#verRegistroModal">
                                                            <i class="fas fa-cogs pr-2" aria-hidden="true"></i>Reparar
                                                        </button>
                                                    @else
                                                        <button  class="btn btn-success btn-rounded waves-effect" onclick="RepararElemento('{{$registros->id_registro}}')">
                                                            <i class="fas fa-check" aria-hidden="true"></i> Reparado
                                                        </button>
                                                    @endif                    
                                                @else  
                                                    ---
                                                @endif
                                            </th>
                                        </tr>                                              
                                    @endforeach
                                </tbody>
                            </table>                  
                        </div>
                    </div>        
                </div>                
            @endif     
        @endforeach 
    @else
        <div class="card-body"> 
            <h2>NO SE ENCONTRARON INSPECCIONES ESTE DIA {{$date}}</h2>
        </div>      
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <form method="POST" action={{ route('buscarXfecha',$registros[0]->floor_id) }}>
                @csrf
                <div class="  d-flex justify-content-between align-items-center">
                    <label class="ml-25" for=""> Buscar por fecha</label>                      
                    <input name="fecha" class="form-control form-control-user w-75" type="date" required>
                    <button class="btn btn-primary " type="submit">buscar</button>
                </div>
            </form>
        </div>  
    @endif    
    
    <!--Modal-->
    
    <div class="modal fade" id="verRegistroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form id="formulario_reparar" method="POST" action="{{ route('repararMalas')}}">
            @csrf  
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reparar Elemento <strong id="elemento"></strong></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div  class="modal-body">
                    <div>
                        <label for=""> Estado Actual: <strong id="estado"></strong></label>
                    </div>
                    <div>
                        <label for=""> Observaciones de Reparacion:</label>
                        <input name="Observaciones" class="form-control form-control-user w-75" type="text">  
                    </div>                             
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>        
                    <button type="submit" class="btn btn-primary btn-icon-split" >
                        <span class="text">Reparar</span>
                    </button>                    
                </div>       
            </div>
        </form> 
      </div>
    </div>
@endsection

@section('scripts')
  <script src="{!! asset('js/Selects/Registros.js') !!}"></script>
@endsection

