@extends('layout.layoutadmin')
@section('title', 'Quản trị')
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
            <li class="breadcrumb-item active">Quản trị</li>
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
                {{-- Hiển thị thông tin trạng thái tạo bài viết --}}

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
                            QUẢN TRỊ
                        </h3>
                        <div class="card-tools">
                            @if (Auth::user()->role_id==1)
                                <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                    <i class="fa fa-plus-circle"></i> Thêm mới
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

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($show_admins as $key => $data)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$data->fullname}}</td>
                                <td>
                                    <img src="{{ url('public/upload_images/'.$data->avatar) }}"
                                         class="img-circle elevation-2" alt="User Image " width="30px" height="30px">
                                </td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->sex}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->birthday}}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="9">
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
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <form action="{{url('post-administrator')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        {{-- Bảo vệ dữ liệu chống hack --}}
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for=""> Họ và Tên:</label>
            <input type="text" name="InputAdminName" class="form-control" id="usr" placeholder="Nhập họ tên" required>
              <div class="invalid-feedback">Chưa nhập họ và tên.</div>
          </div>
          <div class="form-group">
            <label for=""> Hình Ảnh</label>
            <br>
            <input type="file" name="InputFileImage" onchange="previewFile(this);" required>
            <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
          </div>
          <div class="form-group">
            <label for="">Tên Đăng Nhập:</label>
            <input type="text" name="InputAdminAccount" class="form-control" id="usr"
                    placeholder="Nhập tên đăng nhập" required>
                    <small class="text-danger">{{ $errors->first('InputAdminAccount') }}</small>
          </div>
          <div class="form-group">
            <label for="">Mật khẩu</label>
            <input type="password" name="InputAdminPassword" class="form-control" id="usr" placeholder="Nhập mật khẩu" required>
              <div class="invalid-feedback">Chưa nhập mật khẩu.</div>
          </div>
          <div class="form-group">
            <label for="">Địa chỉ</label>
            <textarea class="form-control" rows="5" name="InputAdminAddress" placeholder="Nhập địa chỉ" required></textarea>
              <div class="invalid-feedback">Chưa nhập địa chỉ.</div>
          </div>
          <div class="form-group">
            <label for="">Số Điện Thoại</label>
            <input type="text" class="form-control" name="InputAdminPhone" placeholder="Nhập số điện thoại" required>
              <div class="invalid-feedback">Chưa nhập số điện thoại.</div>
          </div>
          <div class="form-group">
            <label for="">Giới tính</label><br>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="InputSex" value="Nam">Nam
              </label>
            </div>
            <br>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="InputSex" value="Nữ">Nữ
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="">E-mail</label>
            <input type="text" name="InputAdminEmail" class="form-control" id="usr"
                    placeholder="Nhập e-mail" required>
              <div class="invalid-feedback">Chưa nhập email.</div>
                  <small class="text-danger">{{ $errors->first('InputAdminEmail') }}</small>
          </div>
          <div class="form-group">
            <label for="">Ngày Sinh</label>
            <input type="datetime-local"  class="form-control" name="InputAdminBirthday" placeholder="Nhập ngày sinh" required>
              <div class="invalid-feedback">Chưa nhập ngày sinh.</div>
          </div>
          <div class="form-group">
            <label for="">Quyền truy cập</label>
            <select name="InputRoleId" class="form-control" required>
                  <option value=""> -- Chọn --</option>
                  @php($get_roles = DB::table('roll_acesses')->get())
                  @foreach($get_roles as $value)
                      <option value="{{ $value->id }}">{{ $value->role_name }}</option>
                  @endforeach
            </select>
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
