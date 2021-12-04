<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') - {{ \App\Configuration::where('key','appName')->first()->value }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href={{ asset("plugins/fontawesome-free/css/all.min.css") }}>
    <!-- DataTables -->
	<link rel="stylesheet" href={{ asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href={{ asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}>
    <!-- icheck bootstrap -->
	<link rel="stylesheet" href={{ asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
  <!-- SweetAlert2 -->
	<link rel="stylesheet" href='{{ asset("plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css") }}'>
  <!-- Ekko Lightbox -->
	<link rel="stylesheet" href='{{ asset("plugins/ekko-lightbox/ekko-lightbox.css") }}'>
  <!-- Theme style -->
  <link rel="stylesheet" href={{ asset("dist/css/adminlte.min.css") }}>
</head>

        @yield('body')

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src={{ asset("plugins/jquery/jquery.min.js") }}></script>
<!-- Bootstrap -->
<script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
<!-- overlayScrollbars -->
<script src={{ asset("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}></script>
<!-- AdminLTE App -->
<script src={{ asset("dist/js/adminlte.js") }}></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src={{ asset("plugins/jquery-mousewheel/jquery.mousewheel.js") }}></script>
<script src={{ asset("plugins/raphael/raphael.min.js") }}></script>
<script src={{ asset("plugins/jquery-mapael/jquery.mapael.min.js") }}></script>
<script src={{ asset("plugins/jquery-mapael/maps/usa_states.min.js") }}></script>
<!-- ChartJS -->
<script src={{ asset("plugins/chart.js/Chart.min.js") }}></script>
<!-- DataTables  & Plugins -->
<script src={{ asset("plugins/datatables/jquery.dataTables.min.js") }}></script>
<script src={{ asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}></script>
<script src={{ asset("plugins/datatables-responsive/js/dataTables.responsive.min.js") }}></script>
<script src={{ asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}></script>
<script src={{ asset("plugins/datatables-buttons/js/dataTables.buttons.min.js") }}></script>
<script src={{ asset("plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}></script>
<script src={{ asset("plugins/jszip/jszip.min.js") }}></script>
<script src={{ asset("plugins/pdfmake/pdfmake.min.js") }}></script>
<script src={{ asset("plugins/pdfmake/vfs_fonts.js") }}></script>
<script src={{ asset("plugins/datatables-buttons/js/buttons.html5.min.js") }}></script>
<script src={{ asset("plugins/datatables-buttons/js/buttons.print.min.js") }}></script>
<script src={{ asset("plugins/datatables-buttons/js/buttons.colVis.min.js") }}></script>
<script src={{ asset("plugins/chart.js/Chart.min.js") }}></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- SweetAlert2 -->
<script src='{{ asset("plugins/sweetalert2/sweetalert2.min.js") }}'></script>
<!-- Ekko Lightbox-->
<script src='{{ asset("plugins/ekko-lightbox/ekko-lightbox.min.js") }}'></script>
<!-- Filterizr-->
<script src='{{ asset("plugins/filterizr/jquery.filterizr.min.js") }}'></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src={{ asset("dist/js/demo.js") }}></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src={{ asset("dist/js/pages/dashboard2.js") }}></script> -->
<!-- Customs JS -->
<script src='{{ asset("dist/js/customs/datatables.js") }}'></script>
<script src='{{ asset("dist/js/customs/alert.js") }}'></script>
<script src='{{ asset("dist/js/customs/profile.js") }}'></script>
<script src='{{ asset("dist/js/customs/configuration.js") }}'></script>
<script src='{{ asset("dist/js/customs/gallery.js") }}'></script>
<script src='{{ asset("dist/js/customs/chart.js") }}'></script>
</body>
</html>
