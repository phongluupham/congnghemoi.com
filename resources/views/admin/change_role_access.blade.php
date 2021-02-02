@extends('layout.layoutadmin')
@section('title', 'Trang thay đổi quyền truy cập')
@section('contentadmin')
<div class="content-wrapper">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"></div>
            <div class="col-sm-6 text-right">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('page-index-admin')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('page-role-access') }}">Quyền truy cập</a></li>
                    <li class="breadcrumb-item active">Thay đổi quyền truy cập</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 offset-lg-3">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                THAY ĐỔI QUYỀN
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-1">
                            <form action="{{url('update-role/'.$role_ids->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">

                                    <div class="col-sm-6">
                                        <label>Tên người</label>
                                        <input type="text" class="form-control" name="inputName" id="inputName"
                                               value="{{$role_ids->fullname}}" disabled>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Quyền</label>
                                        <select name="InputChangerole" class="form-control">
                                            @php($get_roles = DB::table('roll_acesses')->where('id',$role_ids->role_id)->get())
                                            @foreach($get_roles as $value)
                                                <option value="{{$value->id}}">{{$value->role_name}}</option>
                                            @endforeach

                                            <option value="">- - Chọn - -</option>
                                            @php($get_role_2 = DB::table('roll_acesses')->get())
                                            @foreach($get_role_2 as $value2)
                                                <option value="{{$value2->id}}">{{$value2->role_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    @if (Auth::user()->role_id==1)
                                        <div class="offset-sm-2 col-sm-10 text-right">
                                            <button type="submit" class="btn btn-primary">Thay đổi</button>
                                        </div>
                                    @endif

                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>

                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
@endsection
