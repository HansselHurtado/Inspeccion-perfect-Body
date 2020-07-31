@extends('layouts.app')

@section('content')
@include('modals/modal')  
@include('spiners/spiner')

    <div class="card shadow mb-4 row">
        <div class="card-header py-3">
            @if ($rooms->estado_de_inspeccion == 1)
                <h3 class="m-0 font-weight-bold text-primary">Inspeccionar Componenetes</h3><hr>                
            @else
                <h3 class="m-0 font-weight-bold text-primary">Habitacion Inspeccionda el dia de Hoy</h3><hr>                
            @endif
            <h5 class="m-0 font-weight-bold text-primary">{{$rooms->name}} - {{$floors[0]->piso}}</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="card flex-row justify-content-lg-between justify-content-md-around justify-content-sm-center border-0 flex-wrap">    
                    @foreach ($component_primes as $component_prime )
                        <div class="card shadow p-3 mb-5 bg-white rounded d-sm-block" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$component_prime->name}}</h5>
                                <p class="card-text">aqui va la descripcion de los componenetes que cada uno tiene.</p>                               
                                @if(!count($component_prime->component) == 0)
                                    @if($component_prime->component[0]->estado_de_inspeccion == 1)
                                        <button  value="$component_prime->component_prime_id" onclick="Component('{{$rooms->room_id}}','{{$component_prime->component_prime_id}}');" class=" btn-block btn btn-icon-split justify-content-start btn-primary"  
                                            data-toggle="modal" data-target="#ModalComponent">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                            <span class="text ">Inspeccionar</span>
                                        </button>
                                    @else
                                        <button  value="$component_prime->component_prime_id" onclick="RoomInspection('{{$rooms->room_id}}','{{$component_prime->component_prime_id}}');" class=" btn-block btn btn-icon-split justify-content-start btn-success"  
                                            data-toggle="modal" data-target="#ModalComponentInspeccionada">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check" aria-hidden="true"></i>
                                            </span>
                                            <span class="text ">Inspeccionado</span>
                                        </button>
                                    @endif
                                @else 
                                    <button  value="$component_prime->component_prime_id" class=" btn-block btn btn-icon-split justify-content-start btn-primary">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-arrow-right"></i>
                                        </span>
                                        <span class="text ">No hay elementos</span>
                                    </button>                        
                                @endif                                
                            </div>
                        </div>            
                    @endforeach      
                </div>
            </div>
        </div>  
    </div>
    
@endsection

@section('scripts')
  <script src="{!! asset('js/Selects/ComponenteInspeccion.js') !!}"></script>
@endsection