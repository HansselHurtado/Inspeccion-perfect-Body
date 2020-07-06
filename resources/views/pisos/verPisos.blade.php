@extends('layouts.app')

@section('content')
  @include('estados/mensaje')

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
      <h5 class="m-0 font-weight-bold text-primary">Tablas de pisos</h5>
      <a class="btn m-0 font-weight-bold text-primary" href={{route('createFloor')}} > crear piso</a>
    </div>
    
    <div class="card-body">
      <div class="table-responsive">
        @if($floors->isEmpty())
          <h2>NO HAY NIGUN PISO CREADO</h2><hr>      
          <a href={{route('createFloor')}} class="btn btn-success btn-icon-split">
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
                <th>Nombre de Piso</th>
                <th>Descripcion</th>
                <th style="text-align: center;">Eliminar</th>
                <th style="text-align: center;">Editar</th>            
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Nombre de Piso</th>
                <th>Descripcion</th>
                <th style="text-align: center;">Eliminar</th>
                <th style="text-align: center;">Editar</th>
              </tr>
            </tfoot>
            <tbody>
              @php( $i = 1)
              @foreach ($floors as $floor)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{$floor->name}}</td>
                  <td>
                    @if(strlen($floor->descripcion) == 0)
                      <strong>No tiene </strong>
                    @else
                      {{$floor->descripcion}}
                    @endif
                    </td>
                  <td style="text-align: center;">
                    <a href={{route('editar', $floor->floor_id)}} class="btn btn-success btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                      </span>
                      <span class="text">Editar</span>
                    </a>
                  </td>
                   		
                    <td style="text-align: center;"> 
                      <button class="btn btn-danger btn-icon-split" onclick="EliminarPiso('{{$floor->floor_id}}','{{$floor->name}}');" data-toggle="modal" data-target="#verPisoModal">                      
                        <span class="icon text-white-50">
                          <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Eliminar</span>
                      </button>
                    </td>                         
                </tr>  
                @php( $i++ )                 
              @endforeach
            </tbody>
          </table>
          {{ $floors->links() }}
        @endif
      </div>
    </div>
  </div>



  <!-- Logout Modal-->
    <div class="modal fade" id="verPisoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Seguro que deseas eliminar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Si eliminas  <strong id="piso"></strong>, se eliminará todo lo que este asociado a el.
            Seleciona "Eliminar "para continuar.
            o "Cancelar" para abortar.
          </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             
                <form id="formulario" method="POST" action="">
                  @method('DELETE')
                  @csrf        		
                  <td style="text-align: center;"> 
                    <button type="submit" class="btn btn-danger btn-icon-split">
                      <span  aria-hidden="true">                        
                      <span class="icon text-white-50">
                        <i class="fas fa-trash"></i>
                      </span>
                      <span class="text">Eliminar</span>
                    </button>
                  </td>
                </form>
           
               
            </div>
          </div>
      </div>
    </div>

@endsection

@section('scripts')


  <script src="{!! asset('js/Selects/Modal_de_Eliminar.js') !!}"></script>

@endsection