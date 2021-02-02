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
            <li class="breadcrumb-item active">Slider</li>
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
                            SLIDER
                        </h3>
                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#modelIdSlider">
                                 <i class="fa fa-plus-circle"></i>Thêm mới
                              </a>
                          </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>

                                <th>Tiêu đề</th>
                                <th>Hình ảnh</th>


                                <th colspan="2">Tùy chọn</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($show_slider as $key => $data)
                            <tr>
                                <td>{{++$key}}</td>

                                <td>{{$data->title_slider}}</td>
                                <td><img src="{{ url('public/upload_imagesslider/'.$data->image_slider )}}"
                                         class="img-circle elevation-2" alt="User Image " width="200px" height="150px"></td>


                                <td>
                                    <a href="{{ url('delete-slider/'.$data->id) }}"
                                       title="Xóa" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td>
                                    <a  href="{{url('page-edit-slider/'.$data->id)}}" ><button type="button3" class="btn btn-primary btn-xs" data-placement="left" title="Sửa">
                                      <i class="fas fa-edit"></i></button>
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
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modelIdSlider" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <form action="{{url('post-slider')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Tiêu đề:</label>
                    <input type="text" name="InputTitleSlider" class="form-control" id="" placeholder="Nhập tên slider" required>
                    <div class="invalid-feedback">Chưa nhập tiêu đề slider.</div>
                </div>
                <div class="form-group">
                    <label for=""> Hình Ảnh</label>
                    <br>
                    <input type="file" name="InputImageSlider" onchange="previewFile(this);" required>
                    <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
                </div>
                <div class="form-group">
                    <label for="">Sản phẩm</label>
                    <select name="InputProductId" class="form-control" required>
                        <option value=""> -- Chọn --</option>
                        @php($get_products = DB::table('products')->get())
                        @foreach($get_products as $value)
                            <option value="{{ $value->id }}">{{ $value->product_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
    </div>
  </div>
</div>



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
