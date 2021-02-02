@extends('layout.layoutadmin')
@section('title', 'Trang chủ admin')
@section('contentadmin')

  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Bảng điều khiển</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="contaier-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Đơn đặt hàng</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Sản phẩm mới</p>
              </div>
              <div class="icon">
                <i class="fa fa-apple" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>Khách hàng</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Tổng doanh thu</p>
              </div>
              <div class="icon">
                <i class="fa fa-money" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">Thông tin chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            ĐƠN HÀNG MỚI NHẤT
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Khách hàng</th>
                                <th>Điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($show_orders as $key => $data)
                                @php($show_users = DB::table('users')->where('id', $data->user_id)->get())
                                @foreach($show_users as $show_user)
                                    @if ($data->order_status == 0 || $data->order_status == 2)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$show_user->fullname}}</td>
                                            <td>{{$show_user->phone}}</td>
                                            <td>{{$show_user->address}}</td>
                                            @if ($data->order_status == 0)
                                                <td>Chờ thanh toán</td>
                                            @elseif($data->order_status == 2)
                                                <td>Đã duyệt</td>
                                            @endif
                                            <td>
                                                <a name="" id="" class="btn btn-primary" href="#" role="button">Duyệt</a>
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->

    </section>


  </div>


@endsection

