@extends('layouts.app')

@section('content')
@include('estados/mensaje')

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h5 class="m-0 font-weight-bold text-primary">Tabla de Elemento </h5>  
      <a class="btn m-0 font-weight-bold text-primary" href={{route('createComponentes')}} > crear elementos</a>

    </div>
    <div class="card-body">
      <div class="table-responsive">
        @if($component->isEmpty())    
          <h2>NO HAY ELEMENTO CREADO</h2>
          <hr>      
          <a href={{route('createComponentes')}} class="btn btn-success btn-icon-split">
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
                <th>Elemento</th>
                <th>Descripcion</th>
                <th>Habitacion</th>
                <th>Piso</th>
                <th>Componente</th>
                <th style="text-align: center;">Editar</th>
                <th style="text-align: center;">Eliminar</th>
            
              </tr>
            </thead>
            <tfoot>
              <tr>
                  <th>#</th>
                  <th>Elemento</th>
                  <th>Descripcion</th>
                  <th>Habitacion</th>
                  <th>Piso</th>
                  <th>Componente</th>
                  <th style="text-align: center;">Eliminar</th>
                  <th style="text-align: center;">Editar</th>

              </tr>
            </tfoot>
            <tbody>
              @php( $i = 1)
              
                  @foreach ($component as $components)
                  <tr>
                      <td>{{ $i }}</td>
                      <td>{{$components->name}}</td>
                      <td>
                        @if(strlen($components->descripcion) == 0)
                          <strong>No tiene</strong>
                        @else
                          {{$components->descripcion}}</td>
                        @endif
                      <td>{{$components->room}}</td>
                      <td>{{$components->floor}}</td>
                      <td>{{$components->prime}}</td>
                      <td style="text-align: center;">
                      <a href={{route('editarElemento',$components->component_id)}} class="btn btn-success btn-icon-split">

                          <span class="icon text-white-50">
                              <i class="fas fa-check"></i>
                              </span>
                              <span class="text">Editar</span>
                          </a>
                      </td>
                      <form method="POST" action={{route('EliminarElemento',$components->component_id)}}>
                        @method('DELETE')
                        @csrf        		
                        <td style="text-align: center;">  <button type="submit" href="#" class="btn btn-danger btn-icon-split">
                          <span class="icon text-white-50">
                          <i class="fas fa-trash"></i>
                          </span>
                          <span class="text">Eliminar</span>                        
                        </button></td>
                      </form>            
                  
                  </tr> 
                  @php( $i++ )               
                  @endforeach   
                            
            </tbody>
          </table>
          {{ $component->links() }}

        @endif
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{!! asset('js/Selects/Mensajes_de_Eliminar.js') !!}"></script>
@endsection