<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inspeccion</title>

  <link rel="stylesheet" type="text/css" href="{!! asset('vendor/fontawesome-free/css/all.min.css') !!}">
  <link href="{!! asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') !!}" rel="stylesheet">

  <link rel="stylesheet" href="{!! asset('css/sb-admin-2.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('css/spiner.css') !!}">
  <script src="{{ asset('js/direccion_ip.js') }}"></script> 
  <!-- Custom styles for this template-->
  


</head>

<body class="hidden" id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Perfect Body</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('inspeccion')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inspecionar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      

      <!-- Nav Item - Pages Collapse Menu -->
      @if(auth()->user()->role_id == 1)
        <div class="sidebar-heading">
          Administracion
        </div>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Pisos & Habitaciones</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Qué quieres hacer:</h6>
              <a class="collapse-item" href="{{route('VerPisos')}}">Pisos</a>
              <a class="collapse-item" href="{{route('VerHabitaciones')}}">Habitaciones</a>            
            </div>
          </div>
        </li>
      
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Componentes & Sub-Componentes</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Qué quieres hacer:</h6>
              <a class="collapse-item" href="{{route('VerElementos')}}">Elementos</a>
            </div>
          </div>
        </li>
     
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Complementos
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item ">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Usuarios</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Qué quieres hacer:</h6>
              <a class="collapse-item" href="{{route('verUsarios')}}">Ver usuarios</a>
              <a class="collapse-item" href="{{route('registro')}}">Crear usuario</a>
              <div class="collapse-divider"></div>            
            </div>
          </div>
        </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagess" aria-expanded="true" aria-controls="collapsePagess">
          <i class="fas fa-fw fa-table"></i>
          <span>Registros</span>
        </a>
        <div id="collapsePagess" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Qué quieres hacer:</h6>
            @if(auth()->user()->role_id == 1)
              <a class="collapse-item" href="{{route('registros')}}">Registros de Inspecciones</a>
            @endif            
              <a class="collapse-item" href="{{route('verReparadosPrincipal')}}">Registros Reparados</a>            
              <a class="collapse-item" href="{{route('registro_de_respuesta')}}">Ronda de seguridad</a>            
            <div class="collapse-divider"></div>            
          </div>
        </div>
      </li>
      

      
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar Habitacion..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Muy pronto tendremos noticias
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-grin-beam text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Administración Perfect Body</div>
                    <span class="font-weight-bold">Perfect Body te desea que tengas un dia lleno de muchas bendiciones</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-play  text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Tecnolgía Perfect Body</div>
                    Incluso cuando te tomas unas vacaciones de la tecnología, la tecnología no se toma un descanso de ti 
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-heart text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">Administracion Perfect Body </div>
                     Recuerda que Ninguno de nosotros es tan bueno como todos nosotros juntos
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Perfect Body Medical Center L.T.D.A</a>
              </div>
            </li>

            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @auth
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <strong>{{ auth()->user()->name }}</strong></span>
                  
                  <img class="img-profile rounded-circle" src="{!! asset('img/logo_perfect.png') !!}">

                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <strong>{{ auth()->user()->name }} {{ auth()->user()->apellido }}</strong>
                  </a>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Configuracion
                  </a>
                  @if(auth()->user()->role_id == 1)
                    <a class="dropdown-item" href="{{route('registrar')}}"> 
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Crear usuario
                    </a>
                  @endif
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    cerrar sesion
                  </a>            
                </div>
              @endauth
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
       
          <div class="container-fluid ">
            @yield('content')
          </div>
       
         <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Tecnologia Perfect Body &copy; Software de Inspección 2020</span> <br> <br>
            <span>PERFECT BODY MEDICAL CENTER L.T.D.A</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Estas Listo para Salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione Cerrar sesión a continuación si está listo para finalizar su sesión actua.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          
          <form action="{{ route('logout')}}" method="POST">
            @csrf
            <button class=" btn btn-primary" type="submit">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Cerrar sesion
            </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Custom scripts for all pages-->

  <script type="text/javascript" src="{!! asset('vendor/jquery/jquery.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

  <!-- Core plugin JavaScript-->
  <script type="text/javascript" src="{!! asset('vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="{!! asset('js/sb-admin-2.min.js') !!}"></script>   

  

  @yield('scripts')


</body>

</html>
