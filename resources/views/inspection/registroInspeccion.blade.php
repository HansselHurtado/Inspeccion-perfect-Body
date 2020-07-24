@extends('layouts.app')

@section('content')
@include('estados/mensaje')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary">Registro de Inspecciones</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if($registros->isEmpty())  
            <h2>NO HAY NIGUNA INSPECCION HECHA</h2>
            <hr>
        @else
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Piso</th>
                <th style="text-align: center;" >Ver Inspeccion</th> 
                <th style="text-align: center;" >Ver Inspecciones Malas</th>            
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Piso</th>
                <th style="text-align: center;">Ver Inspeccion</th> 
                <th style="text-align: center;" >Ver Inspecciones Malas</th>  
              </tr>
            </tfoot>
            <tbody id="tr">
              @foreach ($floors as $floor)
              <tr >
                  <td>{{$floor->name}}</td>                 
                  <td  style="text-align: center;" >
                    <a href={{route('revisarRegistroxPiso',$floor->floor_id)}} class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                        <i class="fas fa-calendar"></i>
                        </span>
                        <span  class="text">Revisar</span>
                    </a>
                  </td> 
                  <td style="text-align: center;">
                    <a href={{route('revisarRegistroxPisoMalas',$floor->floor_id)}} class="btn btn-danger btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="	fas fa-calendar-times"></i>
                      </span>
                      <span class="text">Revisar</span>
                    </a>
                  </td>                 

              </tr>                
              @endforeach
            </tbody>
          </table>         
        @endif
      </div>
    </div>
  </div>


@endsection

