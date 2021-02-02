@extends('layout.layoutadmin')
@section('title', 'Trang mô tả sản phẩm')
@section('contentadmin')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CHI TIẾT SẢN PHẨM</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{url('page-list-product-admin')}}">Danh sách sản phẩm</a></li>
              <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"></h3>
              <div class="col-12">
                <img src="{{url('public/upload_imagesproduct/'.$show_product_discribe->product_image)}}" class="product-image" alt="Product Image" style="width: 350px">
              </div>

            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3" style="color: blue">{{$show_product_discribe->product_name}}</h3>
              {{--  <p>Là loại táo cao cấp chứa nhiều dinh dưỡng. Thường có màu đỏ kẻ sọc vàng, quả to, hình tròn, thịt giòn, ngọt</p>  --}}

              <hr>
              <h3  class="my-3">SỐ LƯỢNG</h3>
              <h4><b style="color: green">{{$show_product_discribe->product_quality}}</b></h4>
              <hr>
              <h3  class="my-3">GIẢM GIÁ</h3>
              <h4 class="test"><b>{{$show_product_discribe->product_discount}}%</b></h4>
              <hr>


              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  {{number_format($show_product_discribe->product_price)}}VND/{{$show_product_discribe->product_unitprice}}
                </h2>
                <h4 class="mt-0">
                  <small>Thuế: {{$show_product_discribe->product_tax}}% </small>
                </h4>
              </div>



            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô tả sản phẩm</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{$show_product_discribe->product_discribe}} </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection
