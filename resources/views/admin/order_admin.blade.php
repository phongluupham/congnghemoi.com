@extends('layout.layoutadmin')
@section('title', 'Hóa đơn')
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
            <li class="breadcrumb-item active">Hóa đơn</li>
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
                            HÓA ĐƠN
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Mã hóa đơn</th>
                                <th>Trạng thái</th>
                                <th colspan="2">Tùy chọn</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($show_order as $key => $data)
                                @php($show_users = DB::table('users')->where('id', $data->user_id)->get())
                                @foreach($show_users as $show_user)
                                    @if ($data->order_status == 0 || $data->order_status == 2)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td> <b>{{$show_user->fullname}}</b></td>
                                            <td>0{{$data->id}}</td>
                                            @if ($data->order_status == 0)
                                                <td style="color: blue"> <b>CHỜ THANH TOÁN</b> </td>
                                            @elseif ($data->order_status == 2)
                                                <td style="color: green"> <b>ĐÃ DUYỆT</b> </td>
                                            @endif

                                            @if ($data->order_status == 0)
                                                <td>
                                                    <a href="{{url('change-deliveries/'.$data->user_id.'/'.$data->id)}}" style="color: white"><button type="button3" class="btn btn-primary" title="Duyệt" >
                                                        Duyệt
                                                        </button>
                                                    </a>
                                                </td>
                                            @elseif ($data->order_status == 2)
                                                <td>
                                                    <a href=""><button disabled type="button3" class="btn btn-primary" title="Duyệt" >
                                                            Đã Duyệt
                                                        </button>
                                                    </a>
                                                </td>
                                            @endif

                                            <td>
                                                <a href="{{url('page-order-detail-admin/'.$data->id)}}"><button type="button3" class="btn btn-warning" title="Chi tiết">
                                                        Chi tiết
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <b class="text-danger">Không có dữ liệu</b>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <ul class="pagination justify-content-center pagination-sm mt-2">
                        {{ $show_order->links() }}
                    </ul>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="usr"> Tên Nhà Cung Cấp:</label>
          <input type="text"  class="form-control" id="usr" placeholder="Nhập tên sản phẩm" >
        </div>

        <div class="form-group">
            <label for="change-name"> Hình Ảnh</label>
            <br>
            <input type="file" name="photo" onchange="previewFile(this);" required>
            <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
          </div>

        <div class="form-group">
          <label for="change-passworld">Địa chỉ nhà cung cấp</label>
          <input type="text" class="form-control" id="usr" placeholder="Nhập địa chỉ">
        </div>


        <div class="form-group">
          <label for="usr">Mô tả</label>
          <textarea name="" id="usr" class="form-control" placeholder="Nhập mô tả" ></textarea>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary">Lưu</button>
      </div>
    </div>
  </div>
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

<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Bạn chắc chắn muốn xóa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="fas fa-times-hexagon"></i></span>
            </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="button" class="btn btn-danger">Xóa</button>
        </div>
      </div>
    </div>
  </div>

@endsection
