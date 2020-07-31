@extends('layouts.app')

@section('content')
@include('spiners/spiner')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary"> Editar Pisos</h2>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{route('updateFloors')}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input style="display: none;" name="floor_id" value="{{$floors->floor_id}}" type="text">
                        <input required type="text" class="form-control form-control-user" value="{{$floors->name}}" name="name" >
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" value="{{$floors->descripcion}}" name="description">
                    </div>
                    <button  type="submit" style="margin-top: 30px;" class="btn btn-primary btn-user btn-block">
                        Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection