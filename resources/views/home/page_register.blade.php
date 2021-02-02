@extends('layout.layout')

@section('title', 'Trang đăng ký')

{{--  Nội dung trang web  --}}
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <div class="panel panel-primary">
                        <div class="panel-heading">Đăng ký</div>
                        <div class="panel-body">
                            <form action="{{url('post-register')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Họ và tên:</label>
                                    <input type="text" required autocomplete="off" name="InputNameRegister" class="form-control"  placeholder="Nhập họ và tên">
                                </div>
                                <div class="form-group">
                                  <label for="">Tên tài khoản:</label>
                                  <input type="text" required autocomplete="off" name="InputUserRegister" class="form-control"  placeholder="Nhập tên tài khoản">
                                    <small class="text-danger">{{$errors->first('InputUserRegister')}}</small>
                                </div>
                                <div class="form-group">
                                  <label for="">Mật khẩu:</label>
                                  <input type="password" required autocomplete="off" name="InputPasswordRegister" class="form-control" placeholder="Nhập mật khẩu" id="password">
                                </div>
                                <div class="form-group">
                                  <label for="">Nhập lại mật khẩu:</label>
                                  <input type="password" required autocomplete="off" name="InputPasswordRegister2" class="form-control" placeholder="Nhập lại mật khẩu" style="display: block;width: 100%;height: 100%;" id="confirm_password">
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại:</label>
                                    <input type="text" required autocomplete="off" name="InputPhoneRegister" class="form-control" placeholder="Nhập số điện thoại">
                                  </div>
                                <div class="form-group">
                                    <label for="">Địa chỉ email:</label>
                                    <input type="email" required autocomplete="off" name="InputEmailRegister" class="form-control" placeholder="Nhập email">
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox"> Nhớ tôi</label>
                                </div>
                                <button type="submit" class="btn btn-info btn-block">Đăng ký</button>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

    <script>
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

{{--    @if(session()->has('message'))--}}
{{--        <script>--}}
{{--            Swal.fire({--}}
{{--                position: 'center',--}}
{{--                icon: 'error',--}}
{{--                title: 'Đăng ký thành công',--}}
{{--                showConfirmButton: false,--}}
{{--                timer: 3000--}}
{{--            })--}}
{{--        </script>--}}
{{--    @endif--}}
@endsection
