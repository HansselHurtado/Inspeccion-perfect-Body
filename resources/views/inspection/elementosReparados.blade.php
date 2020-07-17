@extends('layouts.app')

@section('content')
@include('estados/mensaje')
    
    <div class="mb-4 d-flex justify-content-center align-items-center">               
        <h5 class="m-0 font-weight-bold text-primary ">Elementos Reparados</h5>       
    </div>    
    @if(!$raparar->isEmpty())
        <div class="card shadow mb-4">      
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-primary text-light">
                                <th>Elemento</th>                                    
                                <th>Piso</th>
                                <th>Habitacion</th>
                                <th>Componente</th>
                                <th>Estado Anterior</th>
                                <th>Fecha de Reparacion</th>
                                <th>Responsable</th>
                                <th>Observaciones de Reparacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($raparar as $repara )   
                                <tr>                                            
                                    <th>{{$repara->nombreElemento}}</th>
                                    <th>{{$repara->nombrePiso}}</th>
                                    <th>{{$repara->nombrehabitacion}}</th>
                                    <th>{{$repara->NombreComponente }}</th> 
                                    <th>{{$repara->nombreEstado}}</th>
                                    <th>{{$repara->fecha}}</th>
                                    <th style="text-align: center;">{{$repara->nombreUser}}</th>
                                    <th style="text-align: center;">
                                        @if(!strlen($repara->observaciones) == 0)
                                            {{$repara->observaciones}}
                                        @else
                                            --
                                        @endif
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
        No hay Reparaciones
    @endif   
    
@endsection

