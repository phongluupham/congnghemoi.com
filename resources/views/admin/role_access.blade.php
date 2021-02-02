@extends('layout.layoutadmin')
@section('title', 'Quyền truy cập')
@section('contentadmin')

<div class="content-wrapper">


  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Bảng điều khiển</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('page-index-admin')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Quyền truy cập</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="contaier-fluid">

      <!-- Main row -->
      <div class="row">
          <!-- Left col -->
          <section class="col-lg-6">

              @if ($message = Session::get('message'))
                  <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
                  </div>
               @endif
              <!-- TO DO List -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">
                          <i class="ion ion-clipboard mr-1"></i>
                          THÊM QUYỀN
                      </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-1">
                      <div class="container">
                        <form action="{{ url('post-add-role-access') }}" method="POST">
                            @csrf
                          <div class="form-group">
                            <label><b>Tên quyền</b></label>
                              <input type="text" class="form-control" name="inputRoleName"  placeholder="Nhập tên quyền">
                          </div>
                          <div class="form-group">
                              <label>Mô tả quyền</label>
                              <textarea name="inputRoleDescription"  rows="5" placeholder="Nhập mô tả quyền" class="form-control"></textarea>
                          </div>
                          <div class="form-group row">
                              @if(Auth::user()->role_id==1)
                            <div class="col-sm-12 text-right">
                              <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                              @endif
                          </div>
                        </form>
                      </div>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </section>


          <section class="col-lg-6">



              <!-- TO DO List -->
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">
                          <i class="ion ion-clipboard mr-1"></i>
                          QUYỀN NGƯỜI DÙNG
                      </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-1">
                      <table class="table">
                          <thead>
                          <tr>
                              <th>STT</th>
                              <th>HỌ TÊN</th>
                              <th>QUYỀN NGƯỜI DÙNG</th>
                              <th></th>
                          </tr>
                          </thead>
                          <tbody>
                          @forelse($show_roles as $key => $data)
                          <tr>
                              <td>{{++$key}}</td>
                              <td>{{$data->fullname}}</td>

                              <td>
                                  @php($get_roles = DB::table('roll_acesses')->where('id',$data->role_id)->get())
                                  @foreach($get_roles as $value)
                                      {{ $value->role_name }}
                                  @endforeach
                              </td>
                              <td>
                                  @if ($data->role_id == 1)


                                  <button  class="btn btn-primary btn-sm" type="button" disabled > Thay Đổi</button>
                                  @else
                                  <a name="" id="" class="btn btn-primary btn-sm" href="{{url('page-change-role-access/'.$data->id)}}" role="button">Thay Đổi</a>
                                  @endif
                              </td>
                          </tr>
                          @empty
                              <tr>
                                  <td colspan="4">
                                      <b class="text-danger">
                                          Không có dữ liệu
                                      </b>
                                  </td>
                              </tr>
                          @endforelse
                          </tbody>
                      </table>
                      {{-- Tạo nút liệt kê danh sách--}}
                      <ul class="pagination justify-content-center pagination-sm mt-2">
                          {{ $show_roles->links() }}
                      </ul>
                  </div>
                  <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </section>
          <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->

  </section>


</div>


@endsection
