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
      <a href="{{route('admin.logout')}}"> Log out</a>
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
          @if(Auth::check())
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
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.banner')}}" class="nav-link">
                <i class=" nav-icon fas fa-images"></i>
                    <p>Banner</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.slide')}}" class="nav-link">
                <i class="nav-icon fab fa-slideshare"></i>
                    <p>Slide</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.video')}}" class="nav-link">
                <i class="nav-icon fas fa-video"></i>
                    <p>Video</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a class="nav-link">
                <i class=" nav-icon fab fa-product-hunt"></i>
                <p>
                    Product
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.category.product')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category Product</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.product')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Product</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a class="nav-link">
                <i class="nav-icon fas fa-rss-square"></i>
                <p>
                    Blog
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.category.new')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Category Blog</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.new')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Blog</p>
                    </a>
                </li>
                </ul>
                <li class="nav-item">
                    <a href="{{route('admin.config')}}" class="nav-link">
                    <i class="nav-icon fas fa-cogs "></i>
                        <p>Config</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.menu')}}" class="nav-link">
                    <i class="fas fa-bars nav-icon"></i>
                    <p>Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.simplepage')}}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Simple Page</p>
                    </a>
                </li>
            </li>
            <li class="nav-header">BUSSINESS</li>
            <li class="nav-item">
                <a href="{{route('admin.bill')}}" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>Bill</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.kpi')}}" class="nav-link">
                <i class="nav-icon fas fa-flag"></i>
                <p>KPI</p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                    Analyst
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">3</span>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.hot')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>Hot</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.vip.customer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>Vip Customer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.revenue')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                    <p>Revenue</p>
                  </a>
                </li>
                </ul>
            </li>
            <li class="nav-header">USER</li>
            <li class="nav-item">
                <a href="{{route('admin.admin')}}" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>Admin</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.member')}}" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>Member</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.customer')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Customer</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.agency')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Agency</p>
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
<script >
          var route_prefix = "laravel-filemanager";
          $('#lfm_thumbnail').filemanager('image',{prefix: route_prefix});
          $('#lfm_thumbnail_1').filemanager('image',{prefix: route_prefix});
          $('#lfm_thumbnail_2').filemanager('image',{prefix: route_prefix});
          $('#lfm_thumbnail_3').filemanager('image',{prefix: route_prefix});
          $('#lfm_thumbnail_4').filemanager('image',{prefix: route_prefix});
            $('.select2').select2()
          //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
          function ChangeToSlug()
            {
                var title, slug;
                //Lấy text từ thẻ input title 
                title = document.getElementById("name").value;
                //Đổi chữ hoa thành chữ thường
                slug = title.toLowerCase();
 
                //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
                document.getElementById('slug').value = slug;
            }
            $(document).ready(function () {
              bsCustomFileInput.init();
            });
</script>
<script>
  var options = {
                filebrowserImageBrowseUrl: "laravel-filemanager?type=Images",
                filebrowserImageUploadUrl: "laravel-filemanager/upload?type=Images&_token=",
                filebrowserBrowseUrl: "laravel-filemanager?type=Files",
                filebrowserUploadUrl: "laravel-filemanager/upload?type=Files&_token="
              };
        CKEDITOR.replace('my-editor', options);
        CKEDITOR.replace('my-editor-1', options);
</script>
</body>
</html>

