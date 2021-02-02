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
<body>
<div class="col-lg-10 offset-lg-1">
    <div>
        <!-- Content Header (Page header) -->
      <!-- /.content-header -->
        <section>
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-header text-left">
                                    <h3 class="card-title" >
                                        <img src="{{url('public/home/img/logo/logo.png')}}" alt="logo">
                                    </h3>
                                </div>
                                <div class="text-right">
                                    <h4><strong>Hóa đơn: 0{{$show_orders->id}}</strong></h4>
{{--                                    <h4>Ngày: {{$date}}</h4>--}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <div class="container">

                                <div class="page-header text-center" >
                                    {{--  <h1>In hóa đơn</h1>    --}}
                                </div>
                                <!-- Simple Invoice - START -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class=" col-md-6 ">
                                                    <div class="panel panel-default height">
                                                        <div class="panel-heading" style="color: red"><b>From:</b></div>
                                                        <br>
                                                        <div class="panel-body">
                                                            <h4><strong>Freshfruit</strong></h4>
                                                            SDT: 0397648036<br>
                                                            Địa chỉ: Phú Hữu, Châu Thành - Hậu Giang<br>
                                                            Email: luupham@gmail.com<br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="panel panel-default height">
                                                        <div class="panel-heading" style="color: red"><b>To:</b></div>
                                                        <br>
                                                        @php($show_users = DB::table('users')->where('id',$show_orders->user_id)->get())
                                                        @foreach($show_users as $show_user)
                                                        <div class="panel-body">
                                                            <h4><strong>{{$show_user->fullname}}</strong></h4>
                                                            Địa chỉ: {{$show_user->address}} <br>
                                                            SDT: {{$show_user->phone}} <br>
                                                            Email: {{$show_user->email}}
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h3 class="text-center"><strong>Chi tiết hóa đơn</strong></h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-condensed">
                                                            <thead>
                                                                <tr>
                                                                    <td>STT</td>
                                                                    <td><strong>Tên sản phẩm</strong></td>
                                                                    <td class="text-center"><strong>Đơn giá</strong></td>
                                                                    <td class="text-center"><strong>Số lượng</strong></td>
                                                                    <td class="text-right"><strong>Tổng tiền</strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $sub_total =0;
                                                            ?>
                                                            @foreach($show_order_details as $key => $show_order_detail)
                                                                @php($show_products = DB::table('products')->where('id',$show_order_detail->product_id)->get())
                                                                <?php
                                                                $sub_total = $sub_total + $show_order_detail->total_price;
                                                                ?>
                                                                @foreach($show_products as $show_product)
                                                                <tr>
                                                                    <td >{{++$key}}</td>
                                                                    <td><h6><b>{{$show_product->product_name}}</b></h6></td>
                                                                    <td class="text-center">{{number_format($show_product->product_price)}}VND/{{$show_product->product_unitprice}}</td>
                                                                    <td class="text-center">{{$show_order_detail->total_quality}}Kg</td>
                                                                    <td class="text-right">{{$show_order_detail->total_price}}VND</td>
                                                                </tr>
                                                                @endforeach
                                                            @endforeach
                                                                <tr>
                                                                    <td class="highrow"></td>
                                                                    <td class="highrow"></td>
                                                                    <td class="highrow"></td>
                                                                    <td class="highrow text-center"><strong>Tổng phụ</strong></td>
                                                                    <td class="highrow text-right">{{number_format($sub_total)}}VND</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="emptyrow"></td>
                                                                    <td class="emptyrow"></td>
                                                                    <td class="emptyrow"></td>
                                                                    <td class="emptyrow text-center"><strong>Phí giao hàng</strong></td>
                                                                    <td class="emptyrow text-right">
                                                                        <?php
                                                                        if ($sub_total >= 200000) {
                                                                            echo "Miễn phí Ship";
                                                                        }else{
                                                                            $payship = 25000;
                                                                            echo number_format($payship)." VND";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="emptyrow"></td>
                                                                    <td class="emptyrow"></td>
                                                                    <td class="emptyrow"></td>
                                                                    <td class="emptyrow text-center"><strong>Tổng tiền</strong></td>
                                                                    <td class="emptyrow text-right">
                                                                        <?php
                                                                        if ($sub_total >= 200000) {
                                                                            echo number_format($sub_total)." VND";
                                                                        }else{
                                                                            $payship = 25000;
                                                                            $total_price_all = $sub_total + $payship;
                                                                            echo number_format($total_price_all)." VND";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="text-right">
                                                        <button class="button5" title="In" id="btn_print" onclick="Print_pdf();"><i class="fa fa-print fa-2x" style="color: white"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Simple Invoice - END -->

                                </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
        </section>
    </div>


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
<script>
    function Print_pdf(){
        document.getElementById('btn_print').style.display = "none";
        window.print();
    }
</script>
</body>
</html>









