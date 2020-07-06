@extends('layouts.app')

@section('content')
@include('estados/mensaje')

<div class="card shadow mb-4">
      @php( $i=1 )
      @foreach ($rooms as $room )
        <div class="card-header py-3">          
          <h4 class="m-0 font-weight-bold text-primary">COMPONENTE: {{$room->prime}}</h4>
          <h6>Habitacion: {{$room->room}}</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">            
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Elemento</th>
                  <th>Tiene</th>
                  <th style="text-align: center;" >Observaciones</th>             
                </tr>
              </thead>
              <tbody>
                <tr>
                    <th>{{$i}}</th>              
                    <td>{{$component->name}}</td>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                            <label class="custom-control-label" for="defaultUnchecked"> {{$component->state}}</label>
                        </div>                   
                    </td>
                    <td  style="text-align: center;" >
                        <input type="text" name="observaciones" id="">
                    </td>       
                    
                </tr>                
              </tbody>
            </table>  
            
        @php( $i++ )            
        @endforeach     
      </div>
    </div>
  </div>

</div>
</div>

@endsection