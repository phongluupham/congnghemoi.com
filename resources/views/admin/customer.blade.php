@extends('layout.layoutadmin')
@section('title', 'Khách hàng')
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
            <li class="breadcrumb-item active">Khách Hàng</li>
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
                            KHÁCH HÀNG
                        </h3>
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
                                <th>Tùy chọn</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($show_customer as $key => $data)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$data->fullname}}</td>
                                <td><img src="{{ url('public/upload_images2/'.$data->avatar) }}" class="img-circle elevation-2" alt="User Image " width="30px" height="30px"></td>
                                <td>{{$data->username}}</td>
                                <td>{{$data->phone}}</td>
                                <td>{{$data->sex}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->address}}</td>
                                <td>{{$data->birthday}}</td>
                               <td>
                                   <a href="{{ url('delete-customer/'.$data->id) }}"
                                      title="Xóa" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
                                       <i class="fa fa-trash"></i>
                                   </a>
                               </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="10">
                                        <b class="text-danger">
                                            Không có dữ liệu
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
