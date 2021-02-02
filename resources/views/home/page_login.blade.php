@extends('layout.layout')

@section('title', 'Trang đăng nhập')

{{--  Nội dung trang web  --}}
@section('content')


    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <div class="panel panel-primary">
                        <div class="panel-heading">Đăng nhập</div>
                        <div class="panel-body">
                            <form action="{{url('post-login')}}" method="POST">
                                {{-- Bao ve du lieu chong hack--}}
                                @csrf
                                <div class="form-group">
                                  <label for="">Tên tài khoản:</label>
                                  <input type="text" class="form-control"  placeholder="Nhập tên tài khoản" name="inputUsername">
                                </div>
                                <div class="form-group">
                                  <label for="">Mật khẩu:</label>
                                  <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="inputPassword">
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox"> Nhớ tôi</label>
                                </div>
                                <button type="submit" class="btn btn-info btn-block">Đăng nhập </button>
                            </form>
                        </div>
                    </div>
                    <div class="not-account">
                      <a href="{{url('page-register')}}">Nhấp vào đây để đăng ký</a>
                    </div>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    @if(session()->has('messagelogin'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Tài khoản hoặc mật khẩu không đúng!',
                showConfirmButton: false,
                timer: 3000
            })
        </script>
    @endif

@endsection
