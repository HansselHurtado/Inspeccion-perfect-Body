@extends('layouts.app')

@section('content')
  @include('spiners/spiner')
  @include('estados/mensaje')


  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h2 class="m-0 font-weight-bold text-primary">Editar Elemento</h2>
    </div>
    <div class="card-body">
      <form class="user" method="POST" action="{{route('updateElemento')}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group row">
          <div class="col-sm-12 mb-3 mb-sm-0">
            <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select mb-4" id="select-floor" name="floor_id">
              <option value="{{$components[0]->floor_id}}">{{$components[0]->floor}}</option>                     
            </select>
            <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select mb-4" id="select-floor" name="room_id" required>
              <option value="{{$components[0]->room_id}}" >{{$components[0]->room}}</option>                     
            </select>
            <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select mb-4" id="select-floor" name="component_prime_id" required>
            <option value="{{$components[0]->component_prime_id}}">{{$components[0]->prime}}</option>  
              @foreach ($components_primes as $components_prime)
                  <option value="{{$components_prime->component_prime_id}}">{{$components_prime->name}}</option>
              @endforeach                      
            </select>
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input style="display: none;" name="component_id" value="{{$components[0]->component_id}}" type="text">
            <input  type="text" class="form-control form-control-user" name="name" value="{{$components[0]->name}}">
          </div>
          <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" name="description" value="{{$components[0]->descripcion}}">
          </div>    
          <button  type="submit" style="margin-top: 30px;" class="btn btn-primary btn-user btn-block">
            Guardar
          </button> 
        </div>           
      </form>
    </div>
  </div> 
@endsection

@section('scripts')
  <script src="{!! asset('js/Selects/SelectCreateComponentes.js') !!}"></script>
@endsection
