@extends('layouts.app')

@section('content')
@include('estados/mensaje')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Inspeccionar Componenetes</h3><hr>
        <h5 class="m-0 font-weight-bold text-primary">{{$rooms->name}} - {{$floors_name[0]->piso}}</h5>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="card flex-row justify-content-between border-0">    
                    @foreach ($component_primes as $component_prime )
                        <div class="card shadow p-3 mb-5 bg-white rounded " style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$component_prime->name}}</h5>
                                <p class="card-text">aqui va la descripcion de los componenetes que cada uno tiene.</p>
                                <button  value="$component_prime->component_prime_id" onclick="Component('{{$rooms->room_id}}','{{$component_prime->component_prime_id}}');" class=" btn-block btn btn-icon-split justify-content-start btn-primary"  
                                    data-toggle="modal" data-target="#ModalComponent">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                    <span class="text ">Inspeccionar</span>
                                </button>
                            </div>
                        </div>            
                    @endforeach      
                </div>
            </div>
        </div>
    </div>
    
  <!-- Modal -->
    <div class="modal fade" id="ModalComponent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h4 class="modal-title" id="componente"></h4>                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>       
                </div>
                <div class="modal-header bg-blue">
                    <h6 class="modal-title" id="habitacion">{{$rooms->name}}</h6>      
                </div>
                <div class="modal-body">
                    <form action="">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th id="th1">#</th>
                                <th id="elemento">Elemento</th>                                
                                <th id="estados">Tiene</th>                                
                                <th id="observaciones" style="text-align: center;" >Observaciones</th>                        
                            </tr>
                            </thead>
                            <tbody id="contenido"> 

                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')


  <script src="{!! asset('js/Selects/ComponenteInspeccion.js') !!}"></script>

@endsection