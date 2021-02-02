
@extends('admin.layout_profile_admin')
@section('tab-contentadmin')

 <div class="col-md-9 ">
     @if ($message = Session::get('message'))
         <div class="alert alert-success alert-block">
             <button type="button" class="close" data-dismiss="alert">×</button>
             <strong>{{ $message }}</strong>
         </div>
     @endif
            <div class="card">
              <div class="card-header p-2">
                {{--  <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Thông tin cá nhân</a></li>
                </ul>   --}}
                 <div class="single-promo promo2 ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-title text-center ">
                                    <h1 style="color: blue"><b> THÔNG TIN CÁ NHÂN </b></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">

                <form action="{{ url('update-infor-user-admin/'.$infor_user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2 ">
                        <div class="col-md-6">
                            <label >Họ và tên:</label>
                            <input type="text" name="InputNameProfile" class="form-control" placeholder="Nhập họ và tên" value="{{$infor_user->fullname}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label >Tên tài khoản</label>
                            <input type="text" name="InputAccountProfile" class="form-control" placeholder="Nhập tên tài khoản" value="{{$infor_user->username}}" disabled>
                        </div>
                    </div>
                    <div class="row mb-2 radio">
                        <div class="col-md-6">
                            <label >Giới tính:</label>
                            @if ($infor_user->sex == 'Nam')
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="InputSexProfile"  checked value="Nam">
                                <label class="form-check-label" for="InputSexProfile1">
                                  Nam
                                </label>
                              </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="InputSexProfile"  value="Nữ">
                                    <label class="form-check-label" for="InputSexProfile2">
                                        Nữ
                                    </label>
                                </div>
                            @elseif($infor_user->sex == 'Nữ')
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="InputSexProfile" value="Nam">
                                    <label class="form-check-label" for="InputSexProfile1">
                                        Nam
                                    </label>
                                </div>

                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="InputSexProfile"  value="Nữ" checked>
                                <label class="form-check-label" for="InputSexProfile2" >
                                  Nữ
                                </label>
                              </div>
                            @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="InputSexProfile" value="Nam">
                                    <label class="form-check-label" for="InputSexProfile1">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="InputSexProfile"  value="Nữ">
                                    <label class="form-check-label" for="InputSexProfile2" >
                                        Nữ
                                    </label>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label>Ngày sinh:</label>
                            <input type="date" name="InputBirthdayProfile" class="form-control" placeholder="Nhập ngày sinh" value="{{$infor_user->birthday}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label >Điện thoại:</label>
                            <input type="text" name="InputPhoneProfile" class="form-control" placeholder="Nhập số điện thoại" value="{{$infor_user->phone}}">
                        </div>
                        <div class="col-md-6">
                            <label >Địa chỉ:</label>
                            <input type="text" name="InputAddressProfile" class="form-control" placeholder="Nhập địa chỉ" value="{{$infor_user->address}}">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label>Ảnh đại diện:</label>
                            <br>
                            <input type="file" onchange="previewFile(this);" name="InputImageProfile" required>
                            <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
                        </div>
                        <div class="col-md-6">
                            <label>Email:</label>
                            <input type="text" name="InputEmailProfile" class="form-control" placeholder="Nhập email" value="{{$infor_user->email}}">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="button4"><b style="color: white">Cập nhật</b></button>
                    </div>
                </form>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
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
@endsection
