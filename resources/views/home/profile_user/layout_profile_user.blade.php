@extends('layout.layout')

@section('title', 'Thông tin cá nhân')

{{--  Nội dung trang web  --}}
@section('content')


<style>
  .card-box {
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #e7eaed;
    padding: 1.5rem;
    margin-bottom: 24px;
    border-radius: .25rem;
}
.avatar-xl {
    height: 6rem;
    width: 6rem;
}
.rounded-circle {
    border-radius: 50%!important;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #1abc9c;
}
.nav-pills .nav-link {
    border-radius: .25rem;
}
.navtab-bg li>a {
    background-color: #f7f7f7;
    margin: 0 5px;
}
.nav-pills>li>a, .nav-tabs>li>a {
    color: #6c757d;
    font-weight: 600;
}
.mb-4, .my-4 {
    margin-bottom: 2.25rem!important;
}
.tab-content {
    padding: 20px 0 0 0;
}
.progress-sm {
    height: 5px;
}
.m-0 {
    margin: 0!important;
}
.table .thead-light th {
    color: #6c757d;
    background-color: #f1f5f7;
    border-color: #dee2e6;
}
.social-list-item {
    height: 2rem;
    width: 2rem;
    line-height: calc(2rem - 4px);
    display: block;
    border: 2px solid #adb5bd;
    border-radius: 50%;
    color: #adb5bd;
}

.text-purple {
    color: #6559cc!important;
}
.border-purple {
    border-color: #6559cc!important;
}

.timeline {
    margin-bottom: 50px;
    position: relative;
}
.timeline:before {
    background-color: #dee2e6;
    bottom: 0;
    content: "";
    left: 50%;
    position: absolute;
    top: 30px;
    width: 2px;
    z-index: 0;
}
.timeline .time-show {
    margin-bottom: 30px;
    margin-top: 30px;
    position: relative;
}
.timeline .timeline-box {
    background: #fff;
    display: block;
    margin: 15px 0;
    position: relative;
    padding: 20px;
}
.timeline .timeline-album {
    margin-top: 12px;
}
.timeline .timeline-album a {
    display: inline-block;
    margin-right: 5px;
}
.timeline .timeline-album img {
    height: 36px;
    width: auto;
    border-radius: 3px;
}
@media (min-width: 768px) {
    .timeline .time-show {
        margin-right: -69px;
        text-align: right;
    }
    .timeline .timeline-box {
        margin-left: 45px;
    }
    .timeline .timeline-icon {
        background: #dee2e6;
        border-radius: 50%;
        display: block;
        height: 20px;
        left: -54px;
        margin-top: -10px;
        position: absolute;
        text-align: center;
        top: 50%;
        width: 20px;
    }
    .timeline .timeline-icon i {
        color: #98a6ad;
        font-size: 13px;
        position: absolute;
        left: 4px;
    }
    .timeline .timeline-desk {
        display: table-cell;
        vertical-align: top;
        width: 50%;
    }
    .timeline-item {
        display: table-row;
    }
    .timeline-item:before {
        content: "";
        display: block;
        width: 50%;
    }
    .timeline-item .timeline-desk .arrow {
        border-bottom: 12px solid transparent;
        border-right: 12px solid #fff !important;
        border-top: 12px solid transparent;
        display: block;
        height: 0;
        left: -12px;
        margin-top: -12px;
        position: absolute;
        top: 50%;
        width: 0;
    }
    .timeline-item.timeline-item-left:after {
        content: "";
        display: block;
        width: 50%;
    }
    .timeline-item.timeline-item-left .timeline-desk .arrow-alt {
        border-bottom: 12px solid transparent;
        border-left: 12px solid #fff !important;
        border-top: 12px solid transparent;
        display: block;
        height: 0;
        left: auto;
        margin-top: -12px;
        position: absolute;
        right: -12px;
        top: 50%;
        width: 0;
    }
    .timeline-item.timeline-item-left .timeline-desk .album {
        float: right;
        margin-top: 20px;
    }
    .timeline-item.timeline-item-left .timeline-desk .album a {
        float: right;
        margin-left: 5px;
    }
    .timeline-item.timeline-item-left .timeline-icon {
        left: auto;
        right: -56px;
    }
    .timeline-item.timeline-item-left:before {
        display: none;
    }
    .timeline-item.timeline-item-left .timeline-box {
        margin-right: 45px;
        margin-left: 0;
        text-align: right;
    }
}
@media (max-width: 767.98px) {
    .timeline .time-show {
        text-align: center;
        position: relative;
    }
    .timeline .timeline-icon {
        display: none;
    }
}
.timeline-sm {
    padding-left: 110px;
}
.timeline-sm .timeline-sm-item {
    position: relative;
    padding-bottom: 20px;
    padding-left: 40px;
    border-left: 2px solid #dee2e6;
}
.timeline-sm .timeline-sm-item:after {
    content: "";
    display: block;
    position: absolute;
    top: 3px;
    left: -7px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #fff;
    border: 2px solid #1abc9c;
}
.timeline-sm .timeline-sm-item .timeline-sm-date {
    position: absolute;
    left: -104px;
}
@media (max-width: 420px) {
    .timeline-sm {
        padding-left: 0;
    }
    .timeline-sm .timeline-sm-date {
        position: relative !important;
        display: block;
        left: 0 !important;
        margin-bottom: 10px;
    }
}
.button2{
    background: red;
    padding:1.2em 1.4em;
    font-size:10px;
    margin:5px;
    border:none;
    border-radius:10px;
    box-shadow:0 9px gray;
    cursor:pointer;
    outline:none;
}
.button2:active{
    transform:translate(0,4px);
    box-shadow:0 4px gray;
}
.button3{
    background: blue;
    padding:1.2em 1.4em;
    font-size:10px;
    margin:5px;
    border:none;
    border-radius:10px;
    box-shadow:0 9px gray;
    cursor:pointer;
    outline:none;
}
.button3:active{
    transform:translate(0,4px);
    box-shadow:0 4px gray;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<div class="container">
<div class="row">
    <div class="col-lg-4 col-xl-4">
        <div class="card-box text-center">
            <img src="{{url('public/upload_images/'.Auth::user()->avatar)}}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

            <h4 class="mb-0">{{Auth::user()->username}}</h4>

            <a href="{{url('page-infor-user/'.Auth::user()->id)}}"><button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Cập nhật Thông tin</button></a>
            <a href="{{url('change-password/'.Auth::user()->id)}}"><button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light"> Đổi mật khẩu</button></a>

            <div class="text-left mt-3">
              <br></br>
                <h4 class="font-13 text-uppercase">Thông tin cá nhân:</h4>
                <p class="text-muted mb-2 font-13"><strong>Họ và tên:</strong> <span class="ml-2">{{ Auth::user()->fullname}}</span></p>

                <p class="text-muted mb-2 font-13"><strong>Giới tính:</strong> <span class="ml-2">{{ Auth::user()->sex}}</span></p>

                <p class="text-muted mb-2 font-13"><strong>Ngày sinh:</strong> <span class="ml-2">{{ Auth::user()->birthday}}</span></p>

                <p class="text-muted mb-2 font-13"><strong>SDT:</strong> <span class="ml-2">{{ Auth::user()->phone}}</span></p>

                <p class="text-muted mb-2 font-13"><strong>Email:</strong> <span class="ml-2 ">{{ Auth::user()->email}}</span></p>

                <p class="text-muted mb-1 font-13"><strong>Địa chỉ:</strong> <span class="ml-2">{{ Auth::user()->address}}</span></p>
            </div>

        </div> <!-- end card-box -->

    </div> <!-- end col-->

    <div class="col-lg-8 col-xl-8">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
        @endif
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg">
                @php($show_order = DB::table('orders')->where('user_id', Auth::id())->first())
                <li class="nav-item">
                    <a href="{{ url('page-wait-payment/'.Auth::id()) }}" class="nav-link ml-0 " style="color: blue;">
                      <i class="fa fa-credit-card"></i> Chờ thanh toán
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('page-deliveried/'.Auth::id())}}" class="nav-link" style="color: green;">
                      <i class="fa fa-truck"></i></i> Đã giao hàng
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{url('page-cancel-order/'.Auth::id())}}" class="nav-link" style="color: red;">
                    <i class="fa fa-times-circle"></i></i> Đã hủy
                  </a>
              </li>
            </ul>
        </div>
        <!-- end card-box-->


        @yield('tab-content')


    </div>
    <!-- end col -->
</div>
</div>


@endsection
