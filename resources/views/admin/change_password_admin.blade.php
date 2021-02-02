@extends('admin.layout_profile_admin')
@section('tab-contentadmin')
<div class="col-md-9 ">
    <div class="card ">
      <div class="card-header p-2">
        {{--  <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Thông tin cá nhân</a></li>
        </ul>   --}}
          @if ($message = Session::get('message'))
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
              </div>
          @endif
          @if ($message_error_pass_old_comfirm = Session::get('message_error_pass_old_comfirm'))
              <div class="alert alert-warning alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message_error_pass_old_comfirm }}</strong>
              </div>
          @endif
          @if ($message_error_pass_old = Session::get('message_error_pass_old'))
              <div class="alert alert-danger alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message_error_pass_old }}</strong>
              </div>
          @endif
         <div class="single-promo promo2 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-title text-center ">
                            <h1 style="color: red"><b> ĐỔI MẬT KHẨU </b></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div><!-- /.card-header -->
      <div class="card-body">

        <form action="{{url('update-password-admin/'.$infor_password->id)}}" method="POST">
            @csrf
            <div class="row mb-2 ">
                <div class="col-md-6">
                    <label for="usr">Mật khẩu cũ:</label>
                    <input type="password" class="form-control" name="OldPassword" placeholder="Nhập mật khẩu cũ">
                </div>
            </div>
            <div class="row mb-2 radio">
                <div class="col-md-6">
                    <label for="password">Mật khẩu mới:</label>
                    <input type="password" class="form-control" name="NewPassword" placeholder="Nhập mật khẩu mới">
                </div>


            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="usr">Nhập lại mật khẩu mới:</label>
                    <input type="password" class="form-control" name="ConfirmNewPassword" placeholder="Nhập lại mật khẩu mới">
                </div>
                {{--  <div class="col-md-6">
                    <label for="">Địa chỉ:</label>
                    <input type="text" class="form-control" id="usr" placeholder="Nhập địa chỉ">
                </div>  --}}
            </div>
            <div class="text-right">
                <button type="submit" class="button4"><b style="color: white">Đổi mật khẩu</b></button>
            </div>
        </form>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
@endsection
