@extends('layout.layoutadmin')
@section('title', 'Danh sách sản phẩm')
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
            <li class="breadcrumb-item"> <a href="{{url('page-slider')}}">Slider</a> </li>
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
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
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

                        <form action="{{url('update-slider/'.$edit_slider->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Tiêu đề:</label>
                                <input type="text" name="InputNameSliderEdit" class="form-control"  placeholder="Nhập tên sản phẩm" >
                              </div>
                              <div class="form-group">
                                <label> Hình Ảnh:</label>
                                <br>
                                <input type="file" name="InputImageSliderEdit" onchange="previewFile(this);" required>
                                <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
                              </div>
                            <div class="form-group">
                                <label>Sản phẩm</label>
                                <select name="InputProductIdEdit" class="form-control" required>
                                    <option value=""> -- Chọn --</option>
                                    @php($get_products = DB::table('products')->get())
                                    @foreach($get_products as $value)
                                        <option value="{{ $value->id }}">{{ $value->product_name }}</option>
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
