
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')}}" rel="stylesheet">
  <link href="{{('/assets/js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{('/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">

<link rel="stylesheet" href="{{url('/assets/css/argon-dashboard.css')}}">
<style>
 @media screen and (min-width: 700px) {
  .geser_atas {
    margin-top: 20px !important;
  }
 }
 ion-icon {
  font-size: 20px;
}
footer {
    
}
</style>
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      
      @if(Auth::user()->level == 'Admin')
      <a class="navbar-brand pt-0" href="/dashboard_admin">
      @elseif(Auth::user()->level == 'Guru')
      <a class="navbar-brand pt-0" href="/dashboard_guru">
      @else
      <a class="navbar-brand pt-0" href="/dashboard_siswa ">
      @endif
      <h1>
        {{$resto->nama_resto}}
      </h1>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              {{Auth::user()->nama}}
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <div class="dropdown-divider"></div>
             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
            @if(Auth::user()->level == 'Admin')
            <a href="/dashboard_admin">
              <img src="{{url('/assets/img/restoran.jpg')}}" alt="AdminLTE Logo" class="brand-image elevation-1"
           style="opacity: .8">
            </a>
          @elseif(Auth::user()->level == 'Guru')
            <a href="/dashboard_guru">
              <img src="{{url('/assets/img/restoran.jpg')}}" alt="AdminLTE Logo" class="brand-image elevation-1"
           style="opacity: .8">
            </a>
          @else
            <a href="/dashboard_siswa">
              <img src="{{url('/assets/img/restoran.jpg')}}" alt="AdminLTE Logo" class="brand-image elevation-1"
           style="opacity: .8">
            </a>
          @endif
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
       
        <!-- Navigation -->
        <ul class="navbar-nav">
        @if(Auth::user()->level == 'admin')
        <li class="nav-item">
            <a class="nav-link " href="/dashboard_admin">
              <i class="ni ni-planet text-blue"></i> Dashboard
            </a>
          </li>
          @elseif(Auth::user()->level == 'kasir')
          <li class="nav-item">
            <a class="nav-link " href="/dashboard_kasir">
              <i class="ni ni-planet text-blue"></i> Dashboard
            </a>
          </li>
  
          @endif
          @if(Auth::user()->level == 'admin')
            <li class="nav-item {{ (request()->is('akun_user*')) ? 'active' : '' }} {{ (request()->is('pengaturan_aplikasi*')) ? 'active' : '' }} {{ (request()->is('kategori*')) ? 'active' : '' }} {{ (request()->is('masakan*')) ? 'active' : '' }} {{ (request()->is('meja*')) ? 'active' : '' }}">
              <a class="nav-link" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
                <i class="ni ni-single-copy-04 text-blue"></i>
                <span class="nav-link-text">Data Master</span>
              </a>
              <div class="collapse {{ (request()->is('akun_user*')) ? 'show' : '' }} {{ (request()->is('pengaturan_aplikasi*')) ? 'show' : '' }} {{ (request()->is('kategori*')) ? 'show' : '' }} {{ (request()->is('masakan*')) ? 'show' : '' }} {{ (request()->is('meja*')) ? 'show' : '' }}" id="navbar-examples1">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/akun_user" class="nav-link {{ (request()->is('akun_user*')) ? 'active' : '' }}">Akun User</a>
                  </li>
                  <li class="nav-item">
                    <a href="/pengaturan_aplikasi" class="nav-link {{ (request()->is('pengaturan_aplikasi*')) ? 'active' : '' }}">Pengaturan Aplikasi</a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="/kategori" class="nav-link {{ (request()->is('kategori*')) ? 'active' : '' }}">Kategori</a>
                  </li>

                  <li class="nav-item">
                    <a href="/masakan" class="nav-link {{ (request()->is('masakan*')) ? 'active' : '' }}">Masakan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item {{ (request()->is('transaksi_penjualan*')) ? 'active' : '' }}">
              <a class="nav-link" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples2">
                <i class="fas fa-users text-orange"></i>
                <span class="nav-link-text">Transaksi</span>
              </a>
              <div class="collapse {{ (request()->is('transaksi_penjualan*')) ? 'show' : '' }}" id="navbar-examples2">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/transaksi_penjualan" class="nav-link {{ (request()->is('transaksi_penjualan*')) ? 'active' : '' }}">Penjualan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples3">
                <i class="ni ni-chart-bar-32 text-green"></i>
                <span class="nav-link-text">Laporan</span>
              </a>
              <div class="collapse" id="navbar-examples3">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/laporan" class="nav-link">Laporan</a>
                  </li>
                </ul>
              </div>
            </li>
          @endif

            @if(Auth::user()->level == 'kasir')
            <li class="nav-item {{ (request()->is('kategori*')) ? 'active' : '' }} {{ (request()->is('masakan*')) ? 'active' : '' }} {{ (request()->is('meja*')) ? 'active' : '' }}">
              <a class="nav-link" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
                <i class="ni ni-single-copy-04 text-blue"></i>
                <span class="nav-link-text">Data Master</span>
              </a>
              <div class="collapse {{ (request()->is('akun_user*')) ? 'show' : '' }} {{ (request()->is('pengaturan_aplikasi*')) ? 'show' : '' }} {{ (request()->is('kategori*')) ? 'show' : '' }} {{ (request()->is('masakan*')) ? 'show' : '' }} {{ (request()->is('meja*')) ? 'show' : '' }}" id="navbar-examples1">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/kategori" class="nav-link {{ (request()->is('kategori*')) ? 'active' : '' }}">Kategori</a>
                  </li>

                  <li class="nav-item">
                    <a href="/masakan" class="nav-link {{ (request()->is('masakan*')) ? 'active' : '' }}">Masakan</a>
                  </li>
                </ul>
              </div>
            </li>
          <li class="nav-item {{ (request()->is('transaksi_penjualan*')) ? 'active' : '' }} {{ (request()->is('kasir*')) ? 'active' : '' }}">
              <a class="nav-link" href="#navbar-examples5" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples5">
                <i class="fas fa-users text-orange"></i>
                <span class="nav-link-text">Transaksi</span>
              </a>
              <div class="collapse  {{ (request()->is('transaksi_penjualan*')) ? 'show' : '' }} {{ (request()->is('kasir*')) ? 'show' : '' }}" id="navbar-examples5">
                <ul class="nav nav-sm flex-column">
                
                <li class="nav-item">
                    <a href="/kasir" class="nav-link {{ (request()->is('kasir*')) ? 'active' : '' }}">Pesan Makanan</a>
                  </li>
                  <li class="nav-item">
                    <a href="/transaksi_penjualan" class="nav-link {{ (request()->is('transaksi_penjualan*')) ? 'active' : '' }}">History Penjualan</a>
                  </li>
                </ul>
              </div>
            </li>
          <!-- <li class="nav-item">
              <a class="nav-link" href="#navbar-examples6" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples6">
                <i class="ni ni-chart-bar-32 text-green"></i>
                <span class="nav-link-text">Laporan</span>
              </a>
              <div class="collapse" id="navbar-examples6">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/laporan" class="nav-link">Laporan</a>
                  </li>
                </ul>
              </div>
            </li> -->
            @endif


            
            @if(Auth::user()->level == 'pelanggan')
            <li class="nav-item {{ (request()->is('kasir*')) ? 'active' : '' }} {{ (request()->is('transaksi_penjualan*')) ? 'active' : '' }}">
              <a class="nav-link" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples2">
                <i class="fas fa-users text-orange"></i>
                <span class="nav-link-text">Transaksi</span>
              </a>
              <div class="collapse {{ (request()->is('kasir*')) ? 'show' : '' }} {{ (request()->is('transaksi_penjualan*')) ? 'show' : '' }}" id="navbar-examples2">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="/kasir" class="nav-link {{ (request()->is('kasir*')) ? 'active' : '' }}">Pesan Makanan</a>
                  </li>
                  <li class="nav-item">
                    <a href="/transaksi_penjualan" class="nav-link {{ (request()->is('transaksi_penjualan*')) ? 'active' : '' }}">History Pemesanan</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif

        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/dashboard_admin">Dashboard</a>
     
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->nama}}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>
          </li>
        </ul>
      </div>
    </nav>


    @yield('content')

    <footer class="footer text-center pb-0 mb-0 ml-5">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2017 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
        </div>
      </footer>

@yield('footer')
    <!-- End Navbar -->
   
    @include('sweetalert::alert')
  
  

 <!--   Core   -->
 <script src="{{url('/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{url('/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
  <script src="{{url('/assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{url('/assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
  <!--   Argon JS   -->
  <script src="{{url('/assets/js/argon-dashboard.min.js?v=1.1.0')}}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
@stack('scripts')
</body>