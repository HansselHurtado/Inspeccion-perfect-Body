@extends('layouts.app')

@section('content')
  @include('estados/mensaje')
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h2 class="m-0 font-weight-bold text-primary"> Crear Elemento</h2>
      <a class="btn m-0 font-weight-bold text-primary" href={{route('VerElementos')}} > ver elementos</a>
            
    </div>
    <div class="card-body">
      @if($floors->isEmpty())
        <h2>NO HAY NINGUN PISO PARA ASOCIARLE</h2>
        <hr>      
        <a href={{route('createFloor')}} class="btn btn-success btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-check"></i>
            </span>
            <span class="text">Crear</span>
        </a>
      @elseif($rooms->isEmpty())
        <h2>NO HAY NINGUNA HABITACION PARA ASOCIARLE</h2>
        <hr>      
        <a href={{route('createHabitacion')}} class="btn btn-success btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-check"></i>
            </span>
            <span class="text">Crear</span>
        </a>
      @else
        <form class="user" method="POST" action="{{route('createComponentes')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
              <div class="col-sm-12 mb-3 mb-sm-0">
                  <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select mb-4" id="select-floor" name="floor_id" required>
                      <option value="" selected disabled>Escoger Piso</option>
                      @foreach ($floors as $floor)
                          <option value="{{$floor->floor_id}}">{{$floor->name}}</option>
                      @endforeach                    
                  </select>
              </div>
              <div class="col-sm-12 mb-3 mb-sm-0">
                  <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select mb-4" id="select-room" name="room_id" required>
                    <option value="" selected disabled>Escoger Habitacion</option>                                               
                  </select>
              </div>
              <div class="col-sm-12 mb-3 mb-sm-0">
                <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select mb-4" id="select-component_prime_id" name="component_prime_id" required>
                  <option value="" selected disabled>Escoger un Componente</option>
                  @foreach ($componentPrime as $componentPrimes)
                    <option value="{{$componentPrimes->component_prime_id}}">{{$componentPrimes->name}}</option>                 
                  @endforeach                                              
                </select>
              </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input required type="text" class="form-control form-control-user" name="name" placeholder="Nombre del Componente">
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
              <input type="text" class="form-control form-control-user" name="description" placeholder="Descripcion">
            </div>    
            <button  type="submit" style="margin-top: 30px;" class="btn btn-primary btn-user btn-block">
            Guardar
            </button>          
        </form>
      @endif
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{!! asset('js/Selects/SelectCreateComponentes.js') !!}"></script>
@endsection