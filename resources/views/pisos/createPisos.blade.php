@extends('layouts.app')

@section('content')
  @include('spiners/spiner')
  @include('estados/mensaje')

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h2 class="m-0 font-weight-bold text-primary">Crear Piso</h2>
      <a class="btn ml-auto m-0 font-weight-bold text-primary" href={{route('VerPisos')}} > ver piso</a>
    </div>
    <div class="card-body">
        <form class="user" method="POST" action="{{route('createFloor')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0"> <br>             
              <input required type="text" class="form-control form-control-user" name="name" placeholder="Nombre del piso">
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0"><br>              
              <input type="text" class="form-control form-control-user" name="description" placeholder="Descripcion">
            </div>
            <button  type="submit" style="margin-top: 30px;"  class="btn btn-primary btn-user btn-block">
            Guardar
            </button>
        </form>
    </div>
  </div>   
    

@endsection