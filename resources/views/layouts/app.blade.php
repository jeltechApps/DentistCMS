<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Metropolis</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- SB CSS -->
    <link href="{{ asset('sb/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="{{ asset('sb/vendor/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('sb/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('sb/css/sb-admin-2.min.css') }}" rel="stylesheet">

      
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Metropolis</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item @yield('dashboard')">
        <a class="nav-link " href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Kryefaqja</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Charts -->
      <li class="nav-item  @yield('appointment')">
        <a class="nav-link" href="/appointment">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Terminet</span></a>
      </li>

      <li class="nav-item  @yield('pacient')">
        <a class="nav-link" href="/pacient">
          <i class="fas fa-fw fa-user"></i>
          <span>Pacientet</span></a>
      </li>

      <li class="nav-item  @yield('visit')">
        <a class="nav-link" href="/visit">
          <i class="fas fa-fw fa-eye"></i>
          <span>Vizita</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item  @yield('treatment')">
        <a class="nav-link" href="/treatment">
          <i class="fas fa-fw fa-syringe"></i>
          <span>Trajtimi</span></a>
      </li>
      <li class="nav-item  @yield('report')">
        <a class="nav-link" href="/report">
          <i class="fas fa-fw fa-scroll"></i>
          <span>Raporti</span></a>
      </li>
      <li class="nav-item  @yield('service')">
        <a class="nav-link" href="/services">
          <i class="fas fa-fw fa-list"></i>
          <span>Sherbimet</span></a>
      </li>
      <li class="nav-item  @yield('user')">
        <a class="nav-link" href="/user">
          <i class="fas fa-fw fa-user-md"></i>
          <span>Perdoruesit</span></a>
      </li>
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

          @if(Auth::check())
          <!-- Topbar Search -->
          <form method="GET" action="{{ url('search') }}" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
            <input type="text" class="form-control bg-light small @yield('search')" placeholder="Kërko..." name="search" value="@if(isset($keyword)) {{$keyword}} @endif" id="search" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button type="submit" class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          @else 
          @endif

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            @if(Auth::check())
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
                @if(App\Notifications::getNotificationsNumber() > 0)
                <span class="badge badge-danger badge-counter">{{App\Notifications::getNotificationsNumber()}}</span>
                @else 
                @endif
                
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Njoftimet
                </h6>
                @if(App\Notifications::getNotificationsNumber() === 0)
                <a class="dropdown-item d-flex align-items-center" href="/notifications">
                  <div class="mr-3">
                  </div>
                  <div>
                    <span>Nuk ka njoftime</span>
                  </div>
                </a>

                @else
                @foreach(App\Notifications::getNotifications() as $not)
                <div class="dropdown-item d-flex align-items-center" >
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{$not->created_at}}</div>
                    <span class="font-weight-bold">{{$not->description}}!</span>
                  </div>
                  <div class="float-right">
                      <button type="button" class="close" >
                          <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                </div>
                @endforeach
                
                
                @endif
                <a class="dropdown-item text-center small text-gray-500" href="/notifications">Shiko të gjitha njoftimet</a>
              </div>
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
                <i class="fas fa-fw fa-user rounded-circle"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="/user/{{Auth::user()->id}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profili
                </a>
                <a class="dropdown-item" href="/settings">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Aranzhimi
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Dil
                </a>
              </div>
               <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Dëshironi të dilni?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </div>
        <div class="modal-body">A jeni i sigurtë që dëshironi të dilni?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Jo</button>
          
            <button type="submit" class="btn btn-primary" >Dil</button>
           </form>
        </div>
      </div>
    </div>
  </div>

            </li>
            @else 
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link text-secondary @yield('login')" href="/login" id="userDropdown">
              Log in
              </a>
              <!-- Dropdown - User Information -->
            </li>

          </ul>
       
        @endif

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        @if(session('error'))
            <div class="card mb-4  border-bottom-danger" >
                <div class="card-body">
                {{session('error')}}
                </div>
              </div>
        @endif
              @if(session('success'))
              <div class="card mb-4  border-bottom-success" onclick="hide();" >
                  <div class="card-body">
                  {{session('success')}}
                  </div>
                </div>
		            
	            
            @endif

            @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Kreative Programming Team 2019</span>
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

 
    
    
  
    <!-- Scripts -->
    <!-- SB Scripts -->
    <script type="text/javascript" src="{{ asset('sb/vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('sb/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('sb/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('sb/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('sb/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('sb/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sb/vendor/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/app.js')}}"></script>

    <script type="text/javascript">
      $('#searchPacient').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
      type : 'get',
      url : '{{URL::to('searchPacient')}}',
      data:{'search':$value},
      success:function(data){
      $('#pacient-table-body').html(data);
      }
      });
      })

      $('#searchUser').on('keyup',function(){
          $value=$(this).val();
          $.ajax({
        type : 'get',
        url : '{{URL::to('searchUser')}}',
        data:{'search':$value},
        success:function(data){
        $('#user-table-body').html(data);
        }
        });
        })

        $('#searchVisit').on('keyup',function(){
          $value=$(this).val();
          $.ajax({
        type : 'get',
        url : '{{URL::to('searchVisit')}}',
        data:{'search':$value},
        success:function(data){
        $('#visit-table-body').html(data);
        }
        });
        })

        $('#searchService').on('keyup',function(){
          $value=$(this).val();
          $.ajax({
        type : 'get',
        url : '{{URL::to('searchService')}}',
        data:{'search':$value},
        success:function(data){
        $('#service-table-body').html(data);
        }
        });
        })
      </script>
      <script type="text/javascript">
      $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
      </script>
</body>
</html>
