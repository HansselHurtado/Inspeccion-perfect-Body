@extends('layouts.app')

@section('content')
@include('spiners/spiner')

  <!-- Page Heading -->

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 text-center">Bienvenido a inspeccion, mantenimiento y control</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Numero de pisos -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Numero de Pisos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pisos}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-hospital fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Numero de Habitaciones</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $habiatciones}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-ambulance fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Numero de usuarios</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$usuarios}}</div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="	fas fa-grin-beam-sweat fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Inspecciones totales</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$registros}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          
          <!-- Content Row -->
          <div class="row mx-auto">

            <!-- Approach --> 
            <div class="card shadow mb-4" style="
            width: 50%;">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Software de inspeccion Perfect Body Medical center</h6>
              </div>
              <div class="card-body">
                <h6 class="m-0 font-weight-bold text-primary">Misión</h6>
                <p>Las Inspecciones del Trabajo y Seguridad Social en el desempeño de sus funciones y competencias se regirán por los principios contenidos en la Constitución Política de Colombia, los Convenios Internacionales, en especial los de la Organización Internacional del Trabajo ratificados por Colombia y demás normas sobre inspección del trabajo y del ejercicio de la función administrativa. (LEY 1610 DE 2013, Artículo 2°. Principios orientadores.)</p>
                <p class="mb-0">Con las siguientes normativas es de vital importancia una serie de actividades que se realizan con el fin de llevar acabo las diferentes inspecciones</p>
              </div>
            </div>
            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ilustraciones</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                  </div>
                  <p>Esta aplicacion es totalmente responsiva en cualquier dispositivo con acceso a internet. Vea un ejemplo aqui de los navagadores disponibles<a target="_blank" rel="nofollow" href="https://uniwebsidad.com/libros/bootstrap-3/capitulo-1/compatibilidad-con-los-navegadores"> clic aqui</a>, es de vital importancia darle un buen uso para su optimo funcionamiento.</p>
                  <a rel="nofollow"href={{route('inspeccion')}}>Explore aqui algunas inspecciones &rarr;</a>
                </div>
              </div>             

            </div>
            
          </div>


@endsection