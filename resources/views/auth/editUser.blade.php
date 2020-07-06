@extends('layouts.app')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary"> Editar usuario</h2>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{route('updateUser')}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input style="display: none;" name="user_id" value="{{$user[0]->user_id}}" type="text">
                        <input required type="text" class="form-control form-control-user" value="{{$user[0]->name}}" name="name" >
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" value="{{$user[0]->email}}" name="email">
                    </div>
                    <div class="col-sm-12 mb-3 mb-sm-0"  style="margin-top: 25px;">
                        <select style="border-radius: 20px; height: 50px;" class="browser-default custom-select mb-4" id="role_id" name="role_id" required>
                            <option value="{{$user[0]->roleId}}" >{{$user[0]->role}}</option>
                            @foreach ($role as $roles)
                                <option value="{{$roles->role_id}}">{{$roles->name}}</option>
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