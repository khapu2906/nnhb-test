<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
      
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
      <a href="{{route('logout')}}"> Log out</a>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="{{asset('public/resources/images/logo_brand/logo.jpg')}}" alt="HTX Nông nghiệp Hòa Bình" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">HTX Nông nghiệp Hòa Bình</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          @if(Auth::check()&&Auth::user()->role ==1)
          <a class="d-block">{{Auth::user()->accountname}}</a>
          @endif
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{url('member')}}" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                    <p>Thông tin</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('member.bill')}}" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                    <p>Đơn hàng</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="{{asset('public/resources/admin/customer.js')}}"></script>
<script src="{{asset('public/resources/admin/cart.js')}}"></script>
<script src="{{asset('public/resources/admin/ajax.js')}}"></script>
<script src="{{asset('public/resources/admin/chart.js')}}"></script>
<script src="{{asset('public/resources/client/js/login.js')}}"></script>
<script >
         
</script>
</body>
</html>

