
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{url('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.cs')}}s">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{url('public/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{url('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('public/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{url('public/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/home/css/font-awesome.min.css') }}">

  <style type="text/css" media="screen">
    table {
        margin: 5;
        padding: 0;
        width: 100%;
        table-layout: auto;

    }

    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .10em;
    }

    table th,
    table td {
        padding: .200em;
        text-align: center;
        border: 1px solid #ddd;
        font-size: 12px;
    }

    table th {
        font-size: 12px;
        text-transform: uppercase;
        color: black;font-weight: bold;
    }

    @media screen and (max-width: 600px) {
        table {
            border: 0;
            width: 100%;
        }

        table thead {
            clip: rect(0 0 0 0);
            height: 1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
        }

        table tr {
            display: block;
            margin-bottom: 15px;
        }

        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .6em;
            text-align: right;

        }

        table td::before {
            /*
            * aria-label has no advantage, it won't be read inside a table
            content: attr(aria-label);
            */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        table td:last-child {
            border-bottom: 0;
            border: 1px solid #ddd;
        }
    }
</style>
  <style>
    .button3{
      background: blue;
      padding:1.2em 1.4em;
      font-size:10px;
      margin:5px;
      border:none;
      border-radius:5px;
      box-shadow:0 5px gray;
      cursor:pointer;
      outline:none;
  }
  .button3:active{
      transform:translate(0,4px);
      box-shadow:0 2px gray;
  }
  </style>
  <style>
    .button4{
      background: blue;
      padding:1.2em 1.4em;
      font-size:10px;
      margin:5px;
      border:none;
      border-radius:5px;
      box-shadow:0 5px gray;
      cursor:pointer;
      outline:none;
  }
  .button4:active{
      transform:translate(0,4px);
      box-shadow:0 2px gray;
  }
  </style>
  <style>
    .button5{
      background:blue;
      padding:1.2em 1.4em;
      font-size:9px;
      margin:5px;
      border:none;
      border-radius:5px;
      box-shadow:0 5px gray;
      cursor:pointer;
      outline:none;
  }
  .button5:active{
      transform:translate(0,4px);
      box-shadow:0 2px gray;
  }
  </style>
  <style>
    @-webkit-keyframes my {
      0% { color:red; }
      50% { color:  yellow; }
      100% { color:red; }
      }
      {{--  @-moz-keyframes my {
      0% { color: red; }
      50% { color:  yellow; }
      100% { color: red; }
      }  --}}
      @-o-keyframes my {
      0% { color: red; }
      50% { color:  yellow; }
      100% { color: red; }
      }
      @keyframes my {
      0% { color: red; }
      50% { color: yellow; }
      100% { color: red; }
      }
      .test {
        background:white;
        font-size:24px;
        font-weight:bold;
        -webkit-animation: my 700ms infinite;
        -moz-animation: my 700ms infinite;
        -o-animation: my 700ms infinite;
        animation: my 700ms infinite;
        }
  </style>
  <style>
    .height {
        min-height: 200px;
    }

    .icon {
        font-size: 47px;
        color: #5CB85C;
    }

    .iconbig {
        font-size: 77px;
        color: #5CB85C;
    }

    .table > tbody > tr > .emptyrow {
        border-top: none;
    }

    .table > thead > tr > .emptyrow {
        border-bottom: none;
    }

    .table > tbody > tr > .highrow {
        border-top: 3px solid;
    }
    </style>

  {{--  <style>
    input[type=text] {
      background-color: #097c22;
      color: white;
    }
  </style>  --}}
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

    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">3 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 1 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 1 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 1 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
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
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{url('public/dist/img/logotraicay.jpg')}}" width="128" height="128" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">freshfruit.com.vn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      @if (Auth::check())
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{url('public/upload_images/'.Auth::user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{url('page-profile-admin/'.Auth::id())}}" class="d-block">{{Auth::user()->username}}</a>
                </div>
            </div>
      @endif

      <!-- Sidebar Menu -->
        @if (Auth::user()->role_id == 1)
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{url('page-index-admin')}}" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Bảng điều khiển
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <p>
                                Quản lí người dùng
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @if (Auth::user()->role_id == 1)

                        @endif
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('page-role-access')}}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Quyền truy cập</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('page-administrator')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Quản trị</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('page-staff')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nhân viên</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('page-customer')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Khách hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-apple"></i>
                            <p>
                                Quản lý sản phẩm
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('page-category')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Loại sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('page-list-product-admin')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('page-supplier')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nhà cung cấp</p>
                                </a>
                            </li>
                        </ul>


                    </li>
                    <li class="nav-item">
                        <a href="{{url('page-order-admin')}}" class="nav-link">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <p>
                                Quản lý hóa đơn
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('page-slider')}}" class="nav-link">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                            <p>
                                Quản lý slider
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-danger" data-toggle="modal" data-target="#modelIdlogout">
                            <i class="fa fa-sign-out"></i>
                            <p><b>Đăng xuất</b></p>
                        </a>
                    </li>
                </ul>
            </nav>
        @elseif (Auth::user()->role_id == 2)
            
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="{{url('page-index-admin')}}" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Bảng điều khiển
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-apple"></i>
                            <p>
                                Quản lý sản phẩm
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('page-category')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Loại sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('page-list-product-admin')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('page-supplier')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nhà cung cấp</p>
                                </a>
                            </li>
                        </ul>


                    </li>
                    <li class="nav-item">
                        <a href="{{url('page-order-admin')}}" class="nav-link">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <p>
                                Quản lý hóa đơn
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('page-slider')}}" class="nav-link">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                            <p>
                                Quản lý slider
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-danger" data-toggle="modal" data-target="#modelIdlogout">
                            <i class="fa fa-sign-out"></i>
                            <p><b>Đăng xuất</b></p>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif
    
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('contentadmin')

  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.3-pre
    </div>
  </footer>

    <!-- Modal -->
    <div class="modal fade" id="modelIdlogout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    Bạn có muốn đăng xuất không ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    <a href="{{ url('logout') }}" class="btn btn-primary">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{url('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{url('public/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('public/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{url('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{url('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{url('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{url('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('public/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('public/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('public/dist/js/demo.js')}}"></script>
</body>
</html>
