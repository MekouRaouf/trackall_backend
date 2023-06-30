<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trackall</title>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome Icons -->
  <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->
</head>

<body class="hold-transition layout-top-nav">

<div id="app">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="../../index3.html" class="navbar-brand">
          <img src="../../dist/img/AdminLTELogo.png" alt="Trackall" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">TrackAll</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Datas</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="{{ route('page.fingerprints') }}" class="dropdown-item">Fingerprints </a></li>
                <li><a href="{{ route('page.geolocations') }}" class="dropdown-item">Geolocations</a></li>
                <li><a href="{{ route('page.durations') }}" class="dropdown-item">Durations</a></li>
              </ul>
            </li>
          </ul>

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
              <li class="nav-item dropdown">
                  <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Account</a>
                  <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                      <li><a href="{{ route('page.parameters') }}" class="dropdown-item">Parameters </a></li>
                      <li class="dropdown-divider"></li>
                      <li><a href="{{ route('logout') }}" class="dropdown-item">Sign out </a></li>
                  </ul>
              </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      <!-- Main content -->
      @yield('content')
      <!-- /.content -->
      
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
          <strong>Copyright &copy; 2023 <a href="{{ route('home') }}">TrackAll</a>.</strong>
      </div>    
    </footer>
  </div>
  <!-- ./wrapper -->  
</div>

<!-- REQUIRED SCRIPTS -->

<script src="{{ mix('js/app.js') }}"></script>

<!-- jQuery -->
<!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->
</body>
</html>