@extends('layouts.app')

@section('content')
@include('estados/mensaje')

<div class="card shadow mb-4">
 
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h5 class="m-0 font-weight-bold text-primary">Tablas de Habitaciones</h5>
      <a class="btn m-0 font-weight-bold text-primary" href={{route('createHabitacion')}} > crear habitacion</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if($rooms->isEmpty())    

          <h2>NO HAY NINGUNA HABITACION CREADA</h2>
          <hr>      
          <a href={{route('createHabitacion')}} class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
              </span>
              <span class="text">Crear</span>
          </a>

        @else
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre de Habitacion</th>
                <th>Descripcion</th>
                <th>Piso</th>
                <th style="text-align: center;">Eliminar</th>
                <th style="text-align: center;">Editar</th>
            
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Nombre de Habitacion</th>
                <th>Descripcion</th>
                <th>Piso</th>
                <th style="text-align: center;">Eliminar</th>
                <th style="text-align: center;">Editar</th>

              </tr>
            </tfoot>
            <tbody>
             
              @php( $i = 1)
              @foreach ($rooms as $room)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$room->name}}</td>
                  <td>
                    @if(strlen($room->descripcion) == 0)
                      <strong>No tiene </strong>
                    @else
                      {{$room->descripcion}}</td>
                    @endif
                  <td>{{$room->floor}}</td>
                  <td style="text-align: center;">
                      <a href= {{ route('editarHabitacion', $room->room_id) }} class="btn btn-success btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                          </span>
                          <span class="text">Editar</span>
                      </a>
                  </td>                           		
                  <td style="text-align: center;"> 
                  <button class="btn btn-danger btn-icon-split"  onclick="EliminarHabitacion('{{$room->room_id}}','{{$room->name}}');" data-toggle="modal" data-target="#verHabitacionesModal">                      
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Eliminar</span>
                    </button>
                  </td>                 
                </tr>    
                @php ($i++)            
                @endforeach           
            </tbody>
          </table>
          {{ $rooms->links() }}
        @endif
      </div>
    </div>
  </div>
</div>

</div>
<!-- Logout Modal-->
  <div class="modal fade" id="verHabitacionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seguro que deseas eliminar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
          <div  class="modal-body">Si eliminas <strong id="habitacion"></strong>, se eliminará todo lo que este asociado a ella.
            Seleciona "Eliminar "para continuar
            o "Cancelar" para abortar.
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            @if(!$rooms->isEmpty())
              <form id="formulario" method="POST" action="">
                @method('DELETE')
                @csrf        		
                <td style="text-align: center;"> 
                  <button type="submit" class="btn btn-danger btn-icon-split" >
                    <span  aria-hidden="true">                        
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Eliminar</span>
                  </button>
                </td>
              </form> 
            @endif
          </div>       
        </div>
    </div>
  </div>
@endsection


@section('scripts')
  <script src="{!! asset('js/Selects/Modal_de_Eliminar.js') !!}"></script>
@endsection