<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="_token" content="{{csrf_token()}}" />
  {{-- <link href="{{ url('') }}/assets/img/logo/logo.png" type="image/x-icon" rel="icon shortcut"> --}}
  {{-- <link href="{{ url('/assets/img/logo/logo.png') }}" type="image/x-icon" rel="icon"> --}}
  <title>{{$title}}</title>
  <link href="{{ url('') }}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{ url('') }}/assets/css/ruang-admin.min.css" rel="stylesheet">
  {{-- <link href="{{ url('') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" /> --}}
  <link rel="apple-touch-icon" sizes="180x180" href="{{ url('') }}/assets/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ url('') }}/assets/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ url('') }}/assets/img/favicon/favicon-16x16.png">
  <link rel="manifest" href="{{ url('') }}/assets/img/favicon/site.webmanifest">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon">
          <img src="img/logo/logo2.png">
        </div> --}}
        <div class="sidebar-brand-text mx-3">E-Learning</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        @if (Session()->has('role') && ( Session('role') == 'admin' ))
          <a class="nav-link" href="{{ url('dashboard')}}">
          @elseif(Session()->has('role') && ( Session('role') == 'guru' ))
          <a class="nav-link" href="{{ url('dashboardguru')}}">
          @elseif(Session()->has('role') && ( Session('role') == 'siswa' ))
            <a class="nav-link" href="{{ url('student')}}">
        @endif
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      @if (Session()->has('role') && ( Session('role') == 'admin' ))
      <div class="sidebar-heading">
        Master Data
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="false" aria-controls="collapseTable">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User</h6>
            <a class="collapse-item" href="{{ url('guru')}}">Guru</a>
            <a class="collapse-item" href="{{ url('siswa')}}">Siswa</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('kelas')}}">
          <i class="fas fa-fw fa-home"></i>
          <span>Kelas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('mapel')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Mata Pelajaran</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      @endif
      @if (Session()->has('role') && ( Session('role') == 'guru' ))
      <div class="sidebar-heading">
        Menu Guru
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('materi')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Materi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('tugas')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Tugas</span>
        </a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="{{ url('ujian')}}">
          <i class="fas fa-fw fa-book"></i>
          <span>Ujian</span>
        </a>
      </li>
      @endif
      </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="/assets/img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{Session('name')}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/profile/{{Session('idUser')}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
            {{-- <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page">Blank Page</li> --}}
            {{-- </ol> --}}
        </div>
          @yield('content')
      </div>

  {{-- Modal --}}
 @include('components.modal')
  {{-- Modal --}}

  </div>
  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by Rehan & Lorens
        </span>
      </div>
    </div>
  </footer>
  <!-- Footer -->
  </div>
  </div>
  
  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
  </a>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ url('assets') }}/vendor/jquery/jquery.min.js"></script>
  {{-- <script src="{{ url('assets') }}/js/ajax/kelasAjax.js"></script> --}}
  {{-- <script src="{{ url('assets') }}/js/ajax/siswaAjax.js"></script>
  <script src="{{ url('assets') }}/js/ajax/guruAjax.js"></script> --}}
  {{-- <script src="{{ url('assets') }}/js/ajax/mapelAjax.js"></script> --}}
  <script src="{{ url('assets') }}/js/sweetAlert.js"></script>
  <script type="module" src="{{ url('assets') }}/js/ajax/update.js"></script>

  <script src="{{ url('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="{{ url('assets') }}/js/ruang-admin.min.js"></script>
  <script src="{{ url('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ url('assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="{{ url('ckeditor/ckeditor.js') }}"></script>
  {{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
  <script type="text/javascript" src="{{ url('assets') }}/js/clock_assets/jquery.countdown.js"></script>
  <script type="text/javascript" src="{{ url('assets') }}/js/clock_assets/jquery.countdown.min.js"></script>
  <script type="text/javascript">
    

  </script>
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  
  </script>
  
  </body>
  
  </html>