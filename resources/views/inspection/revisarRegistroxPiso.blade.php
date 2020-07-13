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
                @if(!$room->registro->isEmpty())
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary">{{$room->name}}</h5>                        
                        <div class="  d-flex justify-content-between align-items-center">
                            <label style="margin-left: 20px;" for=""> Buscar por fecha</label>                        
                            <input class="form-control form-control-user w-75"  type="date">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <h6 class="m-0 font-weight-bold text-primary"> Fecha de Inspeccion: {{$room->created_at}}</h6>                
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
                                    @foreach($registros as $registro)
                                        @if($registro->nombreHabitacion ==  $room->name )
                                            <tr>                                            
                                                <th>{{$registro->nombreElemento}}</th>
                                                <th style="text-align: center;" >{{$registro->NombreComponente}}</th>
                                                <th style="text-align: center;" >
                                                    @if(strlen($registro->observaciones)==0)
                                                        <span>- - -</span>
                                                    @else
                                                        {{$registro->observaciones}}
                                                    @endif
                                                </th>
                                                <th style="text-align: center;">
                                                    @if($registro->nombreEstado ==  "Bueno")
                                                        <a  title="Bueno" href="#" class="btn btn-success btn-circle">
                                                            <i class="fas fa-check"></i>
                                                        </a>
                                                    @elseif($registro->nombreEstado ==  "Malo")
                                                        <a title="Malo" href="#" class="btn btn-danger btn-circle">
                                                            <i   class="fas fa-exclamation-triangle"></i>
                                                        </a>
                                                    @else
                                                        {{$registro->nombreEstado}}
                                                    @endif
                                                </th>                                            
                                            </tr>                                                  
                                        @endif            
                                    @endforeach
                                </tbody>
                            </table>                  
                        </div>
                    </div>        
                @endif
            </div>           
        @endforeach        
    @endif 
@endsection

