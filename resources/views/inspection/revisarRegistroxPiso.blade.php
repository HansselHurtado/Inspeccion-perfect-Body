@extends('layouts.app')

@section('content')
@include('estados/mensaje')

    @if($registros->isEmpty()) 
        <div class="card-body"> 
            <h2>NO HAY NIGUNA INSPECCION HECHA EN ESTE PISO</h2>
        </div>
    @else
        @foreach ($rooms as $room )
            <div class="card shadow mb-4">                           
                @if($room->registro->isEmpty())    
                         
                @else
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">{{$room->name}} </h5>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">                
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Elemento</th>
                                            <th style="text-align: center;" >Componente</th>
                                            <th style="text-align: center;" >Observaciones</th>
                                            <th style="text-align: center;" >Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>                               
                                        @foreach($registros as $registro)
                                            @if($registro->nombreHabitacion ==  $room->name )
                                                <tr>                                            
                                                    <th>{{$registro->nombreElemento}}</th>
                                                    <th style="text-align: center;" >{{$registro->NombreComponente}}</th>
                                                    <th style="text-align: center;" >
                                                        @if(strlen($registro->observaciones)==0)
                                                            <span>No tiene Observaciones</span>
                                                        @else
                                                            {{$registro->observaciones}}
                                                        @endif
                                                    </th>
                                                    <th style="text-align: center;">
                                                        @if()
                                                        {{$registro->nombreEstado}}
                                                    </th>                                            
                                                </tr>                                                  
                                            @endif            
                                        @endforeach
                                    </tbody>
                                </table>                  
                            </div>
                        </div>        
                    </div> 
                @endif      
        @endforeach        
    @endif 
@endsection

