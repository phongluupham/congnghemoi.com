@extends('layout.layoutadmin')
@section('title', 'Chỉnh sửa danh sách sản phẩm')
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
            <li class="breadcrumb-item"> <a href="{{url('page-list-product-admin')}}">Danh sách sản phẩm</a> </li>
            <li class="breadcrumb-item active">Thay đổi</li>
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
            <section class="col-lg-8 offset-lg-2">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
            @endif
                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            CHỈNH SỬA
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-3">

                        <form action="{{url('update-edit-list-product/'.$edit_product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label> Tên Sản Phẩm:</label>
                                <input type="text"  class="form-control" name="InputNameProductEdit" value="{{$edit_product->product_name}}" placeholder="Nhập tên sản phẩm" >
                              </div>
                              <div class="form-group">
                                <label for="change-name"> Hình Ảnh:</label>
                                <br>
                                <input type="file" name="InputImageProductEdit" onchange="previewFile(this);" required>
                                <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Giá:</label>
                                        <input type="text"  class="form-control" name="InputPriceProductEdit" value="{{$edit_product->product_price}}" placeholder="Nhập giá" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số lượng:</label>
                                        <input type="text" class="form-control" name="InputAmountProductEdit" value="{{$edit_product->product_quality}}" placeholder="Nhập số lượng">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label >Giảm giá</label>
                                        <input type="text" class="form-control" name="InputDiscountProductEdit" value="{{$edit_product->product_discount}}" placeholder="Nhập giảm giá" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Đơn vị tính</label>
                                        <input type="text" class="form-control" name="InputUnitPriceProductEdit" value="{{$edit_product->product_unitprice}}" placeholder="Nhập đơn vị tính" >
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                              <div class="form-group">
                                <label>Thuế</label>
                                <input type="text" class="form-control" name="InputTaxProductEdit" value="{{$edit_product->product_tax}}" placeholder="Nhập thuế">
                              </div>
                              <div class="form-group">
                                <label >Mô tả</label>
                                <textarea name="InputDiscribeProductEdit"  class="form-control" placeholder="Nhập mô tả" ></textarea>
                              </div>
                            <div class="form-group">
                                <label for="">Loại</label>
                                <select name="InputCategoryIdEdit" class="form-control" required>
                                    <option value=""> -- Chọn --</option>
                                    @php($get_categories = DB::table('categories')->get())
                                    @foreach($get_categories as $value)
                                        <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Nhà cung cấp</label>
                                <select name="InputSupplierIdEdit" class="form-control" required>
                                    <option value=""> -- Chọn --</option>
                                    @php($get_suppliers = DB::table('suppliers')->get())
                                    @foreach($get_suppliers as $get_supplier)
                                        <option value="{{ $get_supplier->id }}">{{ $get_supplier->supplier_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                              <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary" >Cập nhật</button>
                            </div>

                        </form>

                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>
    </section>
</div>

<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
        }
    }
  </script>

@endsection
