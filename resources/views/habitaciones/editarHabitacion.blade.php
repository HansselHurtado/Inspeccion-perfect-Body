@extends('layouts.app')

@section('content')
@include('spiners/spiner')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h2 class="m-0 font-weight-bold text-primary">Editar Habitacion</h2>
    </div>
    <div class="card-body">
        <form class="user" method="POST" action="{{route('updateRooms')}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input style="display: none;" name="room_id" value="{{$rooms[0]->room_id}}" type="text">
                    <input required type="text" class="form-control form-control-user" value="{{$rooms[0]->name}}" name="name" >
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" value="{{$rooms[0]->descripcion}}" name="description">
                </div>
                <div class="col-sm-12 mb-3 mb-sm-0"  style="margin-top: 25px;">
                    <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select mb-4" id="select-floor" name="floor_id" required>
                        <option value="{{$rooms[0]->floor_id}}" >{{$rooms[0]->floor}}</option>
                        @foreach ($floors as $floor)
                            <option value="{{$floor->floor_id}}">{{$floor->name}}</option>
                        @endforeach                
                    </select>
                </div>      
                <button  type="submit" style="margin-top: 30px;" class="btn btn-primary btn-user btn-block">
                    Editar
                </button>
            </div>
        </form>
    </div>
</div>

@endsection