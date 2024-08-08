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

  <script>
    let FF_FOUC_FIX;
  </script>
</head>
<body class="sidebar-collapse">
<div class="wrapper">
@yield('body')
 <!-- Main Footer -->
 <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
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
<!-- jQuery Mapael -->
<script src="<?= asset('assets/admin-lte/plugins/jquery-mousewheel/jquery.mousewheel.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/raphael/raphael.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/jquery-mapael/jquery.mapael.min.js') ?>"></script>
<script src="<?= asset('assets/admin-lte/plugins/jquery-mapael/maps/usa_states.min.js') ?>"></script>
<!-- ChartJS -->
{{-- <script src="<?= asset('assets/admin-lte/plugins/chart.js/Chart.min.js') ?>"></script> --}}

<!-- AdminLTE for demo purposes -->
{{-- <script src="<?= asset('assets/admin-lte/dist/js/demo.js') ?>"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="<?= asset('assets/admin-lte/dist/js/pages/dashboard2.js') ?>"></script> --}}

</body>
</html>