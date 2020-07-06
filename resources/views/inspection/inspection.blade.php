@extends('layouts.app')

@section('content')
@include('estados/mensaje')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary">Inspeccionar</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if($rooms->isEmpty())  
          <h2>NO HAY NIGUNA HABITACION Y ELEMENTO ASOCIADO</h2>
          <hr>
        @elseif($components->isEmpty())
          <h2>NO HAY NIGUN ELEMENTO ASOCIADO</h2>
          <hr>
          <a href={{route('createComponentes')}} class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
              </span>
            <span class="text">Crear</span>
          </a>
        @else
        <div class="col-sm-12 mb-3 mb-sm-0 d-flex flex-column">
          <label for=""> Buscar por Piso</label>
          <select style="border-radius: 20px; height: 50px;"  class="browser-default custom-select mb-4 w-75"  id="floor-select" name="floor_id" required>
              <option value="" selected disabled>Escoger Piso</option>
              <option value="0" >Todas las Habitaciones</option>
              @foreach ($floors as $floor)
                  <option value="{{$floor->floor_id}}">{{$floor->name}}</option>
              @endforeach                    
          </select>
      </div>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Habitacion</th>
                <th>Piso</th>
                <th style="text-align: center;" >Inspeccionar</th>             
            
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Habitacion</th>
                <th>Piso</th>
                <th style="text-align: center;">Inspeccionar</th>            

              </tr>
            </tfoot>
            <tbody id="tr">
              @foreach ($rooms as $room)
              <tr >
                  <td>{{$room->name}}</td>
                  <td id="floor_name">{{$room->floor}}</td>
                  <td  style="text-align: center;" >
                      <a href={{route('inspeccionComponentes',$room->room_id)}} class="btn btn-info btn-icon-split">
                          <span class="icon text-white-50">
                          <i class="fas fa-info-circle"></i>
                          </span>
                          <span  class="text">Inspeccionar</span>
                      </a>
                  </td>      
                  
              </tr>                
              @endforeach
            </tbody>
          </table>
          {{ $rooms->links() }}
        @endif
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{!! asset('js/Selects/SelectCreateComponentes.js') !!}"></script>
@endsection