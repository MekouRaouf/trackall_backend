<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trackall</title>
  
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('home') }}" class="h1"><b>Track</b>All</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register to get an api key</p>

      @if(session()->has('errors'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        @foreach(session()->get('errors')->all() as $key => $error)
            * {{ $error }}. <br>
        @endforeach
      </div>
      @endif

      <form action="{{ route('post.register') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Website title" name="name">
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password confirmation" name="password_confirmation">
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        Already a member ?
        <a href="{{ route('home') }}" class="text-center">Sign up</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<script src="{{ asset('js/app.js') }}"></script>

    <!-- jQuery -->
    <!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="../../dist/js/adminlte.min.js"></script> -->
</body>
</html>
