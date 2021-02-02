@extends('layout.layoutadmin')
@section('title', 'Loại sản phẩm')
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
              <li class="breadcrumb-item"><a href="{{url('page-index-admin')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Loại sản phẩm</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="contaier-fluid">

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6">

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
                            THÊM LOẠI
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <div class="container">
                          <form action="{{url('post-add-category')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                            <div class="form-group">
                              <label><b>Tên loại</b></label>
                                <input type="text" class="form-control" name="InputNameCategory" id="inputName" placeholder="Nhập tên loại sản phẩm">
                            </div>
                              <div class="form-group">
                                  <label for=""> Hình Ảnh</label>
                                  <br>
                                  <input type="file" name="InputImageCategory" onchange="previewFile(this);" required>
                                  <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
                              </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="InputDiscribeCategory" id="" rows="5" placeholder="Nhập mô tả loại sản phẩm" class="form-control"></textarea>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>


            <section class="col-lg-6">


                <!-- TO DO List -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="ion ion-clipboard mr-1"></i>
                            CÁC LOẠI SẢN PHẨM
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>TÊN LOẠI</th>
                                <th>HÌNH ẢNH</th>
                                <th>MÔ TẢ</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($show_categories as $key => $data)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$data->category_name}}</td>
                                    <td><img src="{{ url('public/upload_images_category/'.$data->category_image) }}"
                                             class="img-circle elevation-2" width="30px" height="30px"></td>
                                    <td>{{$data->category_description}}</td>
                                    <td>
                                        <a href="{{ url('delete-category/'.$data->id) }}"
                                           title="Xóa" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <b class="text-danger">
                                            Không có dữ liệu
                                        </b>
                                    </td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>

                        {{-- Tạo nút liệt kê danh sách--}}
                        <ul class="pagination justify-content-center pagination-sm mt-2">
                            {{ $show_categories->links() }}
                        </ul>

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

<script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

@endsection
