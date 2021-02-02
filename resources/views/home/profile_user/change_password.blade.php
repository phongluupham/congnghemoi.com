@extends('home.profile_user.layout_profile_user')
@section('tab-content')

<div class="tab-content">
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
  <div class="tab-pane show">
    <form action="{{url('update-password/'.$infor_password->id)}}" method="POST">
    @csrf
      <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label >Mật khẩu cũ</label>
                <input type="password" class="form-control" name="OldPasswordUser" placeholder="Nhập mật khẩu cũ">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label >Mật khẩu mới</label>
                <input type="password" class="form-control" name="NewPasswordUser" placeholder="Nhập mật khẩu mới">
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <label>Nhập lại mật khẩu mới</label>
              <input type="password" class="form-control" name="PasswordUserConfirm" placeholder="Nhập lại mật khẩu mới">
          </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
    <div class="text-right">
      <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Thay đổi</button>
  </div>

    </form>
  </div>
  <!-- end settings content-->


</div>
<!-- end tab-content -->

@endsection
