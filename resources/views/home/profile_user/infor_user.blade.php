@extends('home.profile_user.layout_profile_user')
@section('tab-content')

<div class="tab-content">
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="tab-pane show">
        <form action="{{url('update-infor-user/'.$infor_user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" class="form-control" value="{{$infor_user->fullname}}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Giới tính</label>
                        <br>
                        @if ($infor_user->sex == 'Nam')
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="InputSexUser"  checked value="Nam">
                                <label class="form-check-label" for="InputSexProfile1">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="InputSexUser"  value="Nữ">
                                <label class="form-check-label" for="InputSexProfile2">
                                    Nữ
                                </label>
                            </div>
                        @elseif($infor_user->sex == 'Nữ')
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="InputSexUser" value="Nam">
                                <label class="form-check-label" for="InputSexProfile1">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="InputSexUser" checked value="Nữ">
                                <label class="form-check-label" for="InputSexProfile2">
                                    Nữ
                                </label>
                            </div>
                        @else
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="InputSexUser" value="Nam">
                                <label class="form-check-label" for="InputSexProfile1">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="InputSexUser" value="Nữ">
                                <label class="form-check-label" for="InputSexProfile2">
                                    Nữ
                                </label>
                            </div>
                        @endif

                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Ngày sinh</label>
                        <input type="date" class="form-control" name="InputBirthdayUser" value="{{$infor_user->birthday}}" placeholder="Nhập ngày tháng năm sinh">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Số điện thoại</label>
                        <input type="number" class="form-control" name="InputPhoneUser" value="{{$infor_user->phone}}" placeholder="Nhập số điện thoại">

                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Email</label>
                        <input type="text" class="form-control" name="InputEmailUser" value="{{$infor_user->email}}" placeholder="Nhập địa chỉ email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label > Ảnh đại diện</label>
                        <input type="file" onchange="previewFile(this);" name="InputImageUser" required> <img id="previewImg" src="" style="max-width: 100%;height:50px;border-radius:5px;">
                    </div>
                </div>
            </div> <!-- end row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label >Địa chỉ</label>
                        <input type="text" name="InputAddressUser" class="form-control" value="{{$infor_user->address}}" placeholder="Nhập địa chỉ">
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <div class="text-right">
                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Cập nhật</button>
            </div>
        </form>
    </div>
    <!-- end settings content-->
  </div>
  <!-- end tab-content -->
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
