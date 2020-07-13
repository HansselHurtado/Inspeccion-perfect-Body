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
        @foreach ($registros as $registro )
            @if(!$registro->registro->isEmpty())
                <div class="card shadow mb-4">              
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary">{{$registro->name}} </h5>
                        <div class="  d-flex justify-content-between align-items-center">
                            <label class="ml-25" for=""> Buscar por fecha</label>                        
                            <input class="form-control form-control-user w-75" type="date">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-primary text-light">
                                        <th>Elemento</th>
                                        <th style="text-align: center;" >Componente</th>
                                        <th style="text-align: center;" >Observaciones</th>
                                        <th style="text-align: center;" >Estado / Tiene</th>
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
                                                @if($registros->nombreEstado ==  "Malo")
                                                    <a title="Malo" href="#" class="btn btn-danger btn-circle">
                                                        <i   class="fas fa-exclamation-triangle"></i>
                                                    </a>                                                    
                                                @else
                                                    {{$registros->nombreEstado}}
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
            <h2>NO HAY NIGUNA INSPECCION MALA EN ESTE PISO</h2>
        </div>
    @endif
@endsection

