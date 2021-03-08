<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="{{asset('/')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/resources/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/resources/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/resources/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/resources/admin/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/resources/admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/resources/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/resources/admin/plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('public/resources/admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/resources/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/resources/admin/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background: url({{url('public/resources/admin/image/background.jpg')}})">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><div style="background:white;opacity:0.95"><b>Hus </b>Garden</div></a>
  </div>
  <!-- /.login-logo -->
  @include('admin.error')
  <div class="card" style="background:white;opacity:0.95">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in </p>
        
      <form action="" method="post">
          @csrf
        <div class="input-group mb-3">
          <input type="text" name="accountname" class="form-control" placeholder="ID">
          <div class="input-group-append">
            <div class="input-group-text">
            <i class="fas fa-user"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn  btn-block" style="background:#4a552a;color:white">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('public/resources/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/resources/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/resources/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/resources/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/resources/admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('public/resources/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/resources/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('public/resources/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/resources/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/resources/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/resources/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/resources/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/resources/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/resources/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/resources/admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/resources/admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/resources/admin/dist/js/demo.js')}}"></script>
<script src="{{asset('public/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

</body>
</html>