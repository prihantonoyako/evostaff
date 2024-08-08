<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> E-Ticket | <?= $title ?> </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= asset('assets/admin-lte/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= asset('assets/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= asset('assets/admin-lte/dist/css/adminlte.min.css') ?>">
  @yield('pageStyle')

  <script>
    let FF_FOUC_FIX;
  </script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="<?= asset('assets/admin-lte/dist/img/AdminLTELogo.png') ?>" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        
        <!-- Dark Mode -->
        <li class="nav-item">
          <a class="nav-link" data-widget="dark-mode" data-slide="true" href="#" role="button">
            <i class="fas fa-adjust"></i>
          </a>
        </li>
        <!-- EOL Dark Mode -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <!-- logout button -->
        <li class="nav-item">
          <a class="nav-link" href="<?= $actionNavigation['urlLogout'] ?>" data-toggle="modal" data-target="#modal-logout" role="button">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        {{-- <img src="<?= asset('assets/admin-lte/dist/img/AdminLTELogo.png') ?>" alt="EvoStaff" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">EvoStaff</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= asset('storage/'.$profile['photo']) ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ $profile['name'] }}</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            @foreach($menus as $p)
            <li class="nav-item">
              <a href="{{ $p['path'] }}" class="nav-link">
                <i class="nav-icon {{ $p['icon'] }}"></i>
                <p>
                  {{ $p['name'] }}
                  @if (array_key_exists('child', $p))
                  <i class="right fas fa-angle-left"></i>
                  @endif
                </p>
              </a>
              @if (array_key_exists('child', $p))
              <ul class="nav nav-treeview">
                @foreach($p['child'] as $c)
                <li class="nav-item">
                  <a href="{{ $c['path'] }}" class="nav-link">
                    <i class="nav-icon {{ $c['icon'] }}"></i>
                    <p>{{ $c['name'] }}</p>
                  </a>
                </li>
                @endforeach
              </ul>
              @endif
            </li>
            @endforeach
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    @yield('content')

    <div class="modal fade" id="modal-logout">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Logout</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <form id="logout_form" action="{{url('/auth/logout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Yes</button>
            </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2024-2025 <a href="https://karyatekno.biz.id">KaryaTekno</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 0.0.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="<?= asset('assets/admin-lte/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap -->
  <script src="<?= asset('assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- overlayScrollbars -->
  <script src="<?= asset('assets/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= asset('assets/admin-lte/dist/js/adminlte.js') ?>"></script>

  <!-- PAGE PLUGINS -->
  @yield('pageScript')
  <!-- jQuery Mapael -->
  <script src="<?= asset('assets/admin-lte/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
  <script src="<?= asset('assets/admin-lte/plugins/raphael/raphael.min.js') ?>"></script>
  <script src="<?= asset('assets/admin-lte/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
  <script src="<?= asset('assets/admin-lte/plugins/jquery-mapael/maps/usa_states.min.js') ?>"></script>
  <!-- ChartJS -->
  <script src="<?= asset('assets/admin-lte/plugins/chart.js/Chart.min.js') ?>"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="<?= asset('assets/admin-lte/dist/js/demo.js') ?>"></script>

  <script>

$(document).ready(function() {
    $('a.nav-link[data-widget="dark-mode"]').click(function(event) {
        $('a.nav-link[data-widget')
        // Prevent the default action of the link
        event.preventDefault();
        
        var isSlide = $(this).data('slide');

        if (isSlide === true || isSlide === 'true') {
          $(this).data('slide', 'false');
          $('body').removeClass('dark-mode');
        } else {
          $(this).data('slide', 'true');
          $('body').addClass('dark-mode');
        }
    });
});
  </script>
</body>
</html>