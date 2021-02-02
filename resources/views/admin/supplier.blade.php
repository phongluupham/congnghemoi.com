@extends('layout.layoutadmin')
@section('title', 'Nhà cung cấp')
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
            <li class="breadcrumb-item active">Nhà cung cấp</li>
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
                            NHÀ CUNG CẤP
                        </h3>
                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#modelId">
                                 <i class="fa fa-plus-circle"></i>Thêm mới
                              </a>
                          </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên nhà cung cấp</th>
                                <th>Địa chỉ nhà cung cấp</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>

                                {{--  <th>Mô tả</th>  --}}
                                {{--  <th>Giảm giá</th>  --}}
                                {{--  <th>Đơn vị tính</th>  --}}
                                {{--  <th>Thuế</th>  --}}
                                <th colspan="2">Tùy chọn</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($show_supplier as $key => $data)
                            <tr>
                                <td>{{++$key}}</td>
                                <td style="color: red"> <b>{{$data->supplier_name}}</b></td>
                                <td>{{$data->supplier_address}}</td>
                                <td><img src="{{url('public/upload_imagessupplier/'.$data->supplier_image)}}"
                                         class="img-circle elevation-2" alt="Logo " width="40px" height="40px"></td>
                                <td>{{$data->supplier_discribe}}</td>

                                {{--  <td>10%</td>  --}}
                                {{--  <td>21/02/1999</td>  --}}
                                <td>
                                    <a href="{{ url('delete-supplier/'.$data->id) }}"
                                       title="Xóa" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn muốn xóa không ?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('page-edit-supplier/'.$data->id)}}" ><button type="button3" class="btn btn-primary btn-xs" data-placement="left" title="Thay đổi">
                                      <i class="fas fa-edit"></i></button>
                                    </a>
                                  </td>

                            </tr>
                            @empty
                            <tr class="text-danger">
                                <td colspan="7"><b>Không có dữ liệu</b></td>
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
        <form action="{{url('post-supplier')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for=""> Tên Nhà Cung Cấp:</label>
                    <input type="text" name="InputNameSupplier" class="form-control" id="" placeholder="Nhập tên sản phẩm" required>
                    <div class="invalid-feedback">Chưa nhập tên nhà cung cấp.</div>
                </div>

                <div class="form-group">
                    <label for=""> Hình Ảnh</label>
                    <br>
                    <input type="file" name="InputImageSupplier" onchange="previewFile(this);" required>
                    <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
                </div>

                <div class="form-group">
                    <label for="">Địa chỉ nhà cung cấp</label>
                    <input type="text" class="form-control" id="" name="InputAddressSupplier" placeholder="Nhập địa chỉ">
                    <div class="invalid-feedback">Chưa nhập địa chỉ nhà cung cấp.</div>
                </div>


                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="InputDiscribeSupplier" id="" class="form-control" placeholder="Nhập mô tả" ></textarea>
                    <div class="invalid-feedback">Chưa nhập mô tả.</div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </form>
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


@endsection
