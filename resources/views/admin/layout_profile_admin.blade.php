@extends('layout.layoutadmin')
@section('title', 'Thông tin cá nhân')
@section('contentadmin')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('page-index-admin')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Thông tin admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img src="{{url('public/upload_images/'.Auth::user()->avatar)}}" alt="Image User" style="max-width: 100%;height:100px;border-radius:5px;">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->username}}</h3>

                {{--  <p class="text-muted text-center">Software Engineer</p>  --}}

                {{--  <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Followers</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li>
                </ul>  --}}
{{--                <a href="{{url('page-profile-admin')}}" class="btn btn-primary btn-block"><b>Chỉnh sửa TTCN</b></a>--}}
                <a href="{{url('page-change-password-admin/'.Auth::user()->id)}}" class="btn btn-primary btn-block"><b>Đổi mật khẩu</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Thông tin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Họ và tên</strong>

                <p class="text-muted">
                  {{Auth::user()->fullname}}
                </p>

                <hr>

                <strong><i class="fas fa-user"></i> Tên tài khoản</strong>

                <p class="text-muted">{{Auth::user()->username}}</p>

                <hr>

                <strong><i class="fas fa-restroom"></i> Giới tính</strong>

                <p class="text-muted">
                  {{Auth::user()->sex}}
                </p>

                <hr>

                <strong><i class="fa fa-birthday-cake"></i> Ngày sinh</strong>

                <p class="text-muted">{{Auth::user()->birthday}}</p>
                <hr>

                <strong><i class="fa fa-phone"></i> Điện thoại</strong>

                <p class="text-muted">{{Auth::user()->phone}}</p>

                <hr>

                <strong><i class="fa fa-envelope"></i> Email</strong>

                <p class="text-muted">{{Auth::user()->email}}</p>

                <hr>

                <strong><i class="fas fa-address-card"></i> Địa chỉ</strong>

                <p class="text-muted">{{Auth::user()->address}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          @yield('tab-contentadmin')
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
