@extends('layout.layoutadmin')
@section('title', 'Nhân viên')
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
            <li class="breadcrumb-item active">Nhân viên</li>
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
                            NHÂN VIÊN
                        </h3>
                        <div class="card-tools">
                            @if (Auth::user()->role_id==1)
                                <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#modelIdStaff">
                                    <i class="fa fa-plus-circle"></i>Thêm mới
                                </a>
                            @endif

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Hình ảnh</th>
                                <th>Tài khoản</th>
                                <th>Số điện thoại</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Ngày sinh</th>
                                <th colspan="2">Tùy chọn</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($show_staffs as $key => $data)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$data->fullname}}</td>
                                <td><img src="{{ url('public/upload_images/'.$data->avatar) }}"
                                         class="img-circle elevation-2" alt="User Image " width="30px" height="30px"></td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->sex}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->birthday}}</td>
                                <td>
                                    <a href="{{ url('delete-staff/'.$data->id) }}"
                                    title="Xóa" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td>
                                  <a href="{{url('page-change-role-access/'.$data->id)}}" title="Thay đổi quyền" class="btn btn-primary btn-xs">
                                    <i class="fa fa-exchange" aria-hidden="true"></i>
                                  </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="11">
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
<div class="modal fade" id="modelIdStaff" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <form action="{{url('post-staff')}}"  method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

            {{--Bảo vệ dữ liệu chống hack--}}
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for=""> Họ và Tên:</label>
                    <input type="text" name="InputStaffName" class="form-control" id="" placeholder="Nhập họ tên" >
                    <div class="invalid-feedback">Chưa nhập họ và tên.</div>
                </div>
                <div class="form-group">
                    <label for=""> Hình Ảnh</label>
                    <br>
                    <input type="file" name="InputFileImage2" onchange="previewFile(this);" required>
                    <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
                </div>
                <div class="form-group">
                    <label for="">Tên Đăng Nhập:</label>
                    <input type="text" name="InputStaffAccount" class="form-control" id="usr" placeholder="Nhập tên đăng nhập" >
                    <div class="invalid-feedback">Chưa nhập tên tài khoản.</div>
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="InputStaffPassword" class="form-control" id="usr" placeholder="Nhập mật khẩu" >
                    <div class="invalid-feedback">Chưa nhập mật khẩu.</div>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <textarea class="form-control" rows="5" id="usr" placeholder="Nhập địa chỉ" name="InputStaffAddress"></textarea>
                    <div class="invalid-feedback">Chưa nhập địa chỉ.</div>
                </div>
                <div class="form-group">
                    <label for="">Số Điện Thoại</label>
                    <input type="text" name="InputStaffPhone" class="form-control" id="usr" placeholder="Nhập số điện thoại" >
                    <div class="invalid-feedback">Chưa nhập số điện thoại.</div>
                </div>
                <div class="form-group">
                    <label for="">Giới tính</label><br>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="InputStaffSex" value="Nam">Nam
                        </label>
                    </div>
                    <br>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="InputStaffSex" value="Nữ">Nữ
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" name="InputStaffEmail" class="form-control" id="usr" placeholder="Nhập e-mail" >
                    <div class="invalid-feedback">Chưa nhập email.</div>
                </div>
                <div class="form-group">
                    <label for="">Ngày Sinh</label>
                    <input type="datetime-local" name="InputStaffBirthday" class="form-control" id="usr" placeholder="Nhập ngày sinh" >
                    <div class="invalid-feedback">Chưa nhập ngày sinh.</div>
                </div>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>

    </div>
  </div>
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
