@extends('layout.layoutadmin')
@section('title', 'Hóa đơn')
@section('contentadmin')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('page-index-admin')}}">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{url('page-order-admin')}}">Hóa đơn</a></li>
            <li class="breadcrumb-item active">Chi tiết hóa đơn</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" >
                            <i class="ion ion-clipboard mr-1"></i>
                           CHI TIẾT HÓA ĐƠN
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <div class="container">

                            <div class="page-header text-center" >
                                <h1 >Đơn Hàng</h1>
                            </div>

                            <!-- Simple Invoice - START -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <h3>Mã đơn hàng: <b onmouseover="this.style.color = 'red'" onmouseout="this.style.color = 'lime'" style="color: lime">0{{$show_orders->id}}</b></h3>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class=" col-md-12">
                                                @php($show_user = DB::table('users')->where('id',$show_orders->user_id)->get())
                                                @foreach($show_user as $data)
                                                <div class="panel panel-default height">
                                                    <div class="panel-heading" style="color: red"><b>Thông tin khách hàng</b></div>
                                                    <div class="panel-body">
                                                        <strong>Họ tên: {{$data->fullname}}</strong><br>
                                                        SDT: {{$data->phone}}<br>
                                                        Địa chỉ: {{$data->address}}<br>
                                                        Email: {{$data->email}}<br>
                                                    </div>
                                                </div>
                                                @endforeach
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
                                                                <td class="text-center">STT</td>
                                                                <td class="text-center"><strong>Tên sản phẩm</strong></td>
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
                                                                <td rowspan="1"  class="text-center">{{++$key}}</td>
                                                                <td  class="text-center"><h6><b>{{$show_product->product_name}}</b></h6></td>
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
                                                   <a href="{{url('page-print-order/'.$show_orders->id)}}"> <button class="button5"><h6 style="color: white"><i class="fa fa-plus-square" aria-hidden="true"></i> Xuất hóa đơn</h6></button></a>
                                                    {{--  <button class="button5" title="In"><i class="fa fa-print fa-2x" style="color: white"></i></button>    --}}
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
@endsection
