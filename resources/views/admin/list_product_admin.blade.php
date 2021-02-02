@extends('layout.layoutadmin')
@section('title', 'Danh sách sản phẩm')
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
            <li class="breadcrumb-item active">Danh sách sản phẩm</li>
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
                            DANH SÁCH SẢN PHẨM
                        </h3>
                        <div class="card-tools">
                            <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#modelIdProduct">
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
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                {{--  <th>Mô tả</th>  --}}
                                <th>Giảm giá</th>
                                <th>Đơn vị tính</th>
                                <th>Thuế</th>
                                <th colspan="3">Tùy chọn</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($show_product as $key => $data)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td> <a href="{{url('page-product-discribe/'.Str::slug($data->product_name).'/'.$data->id)}}">{{$data->product_name}}</a> </td>
                                    <td><img src="{{ url('public/upload_imagesproduct/'.$data->product_image) }}"
                                             class="img-circle elevation-2" alt="User Image " width="30px" height="30px"></td>
                                    <td>{{$data->product_price}}</td>
                                    <td>{{$data->product_quality}}</td>
                                    <td>{{$data->product_discount}}</td>
                                    <td>{{$data->product_unitprice}}</td>
                                    <td>{{$data->product_tax}}</td>
                                    <td>
                                        <a href="{{url('page-product-discribe/'.Str::slug($data->product_name).'/'.$data->id)}}" ><button type="button3" class="btn btn-primary btn-xs" data-placement="left" title="Chi tiết">
                                                <i class="fas fa-info"></i></button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url('delete-list-product-admin/'.$data->id) }}"
                                           title="Xóa" class="btn btn-danger btn-xs" onclick="return confirm('Bạn có chắc chắn không ?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a  href="{{url('page-edit-list-product/'.$data->id)}}" ><button type="button3" class="btn btn-primary btn-xs" data-placement="left" title="Thay đổi">
                                                <i class="fas fa-edit"></i></button>
                                        </a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11">
                                        <b class="text-danger">
                                            Không có dữ liệu
                                        </b>
                                    </td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                    <ul class="pagination justify-content-center pagination-sm mt-2">
                        {{ $show_product->links() }}
                    </ul>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modelIdProduct" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <form action="{{url('post-list-product-admin')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for=""> Tên Sản Phẩm:</label>
                    <input type="text" name="InputNameProduct" class="form-control" placeholder="Nhập tên sản phẩm" required>
                    <div class="invalid-feedback">Chưa nhập tên sản phẩm.</div>
                </div>
                <div class="form-group">
                    <label for=""> Hình Ảnh</label>
                    <br>
                    <input type="file" name="InputImageProduct" onchange="previewFile(this);" required>
                    <img id="previewImg" src="" style="max-width: 100%;height:80px;border-radius:5px;">
                </div>
                <div class="form-group">
                    <label for="">Giá:</label>
                    <input type="text" name="InputPriceProduct" class="form-control" id="usr" placeholder="Nhập giá" >
                    <div class="invalid-feedback">Chưa nhập giá.</div>
                </div>
                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="text" name="InputAmountProduct" class="form-control" id="usr" placeholder="Nhập số lượng">
                    <div class="invalid-feedback">Chưa nhập số lượng.</div>
                </div>
                <div class="form-group">
                    <label for="">Giảm giá</label>
                    <input type="text" name="InputDiscountProduct" class="form-control" id="" placeholder="Nhập giảm giá" >
                    <div class="invalid-feedback">Chưa nhập giảm giá.</div>
                </div>
                <div class="form-group">
                    <label for="">Đơn vị tính</label>
                    <input type="text" name="InputUnitPriceProduct" class="form-control" id="" placeholder="Nhập đơn vị tính" >
                    <div class="invalid-feedback">Chưa nhập đơn vị tính.</div>
                </div>
                <div class="form-group">
                    <label for="">Thuế</label>
                    <input type="text" name="InputTaxProduct" class="form-control" placeholder="Nhập thuế">
                    <div class="invalid-feedback">Chưa nhập thuế.</div>
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="InputDiscribeProduct" id="" class="form-control" placeholder="Nhập mô tả" ></textarea>
                    <div class="invalid-feedback">Chưa nhập mô tả.</div>
                </div>
                <div class="form-group">
                    <label for="">Loại</label>
                    <select name="InputCategoryId" class="form-control" required>
                        <option value=""> -- Chọn --</option>
                        @php($get_categories = DB::table('categories')->get())
                        @foreach($get_categories as $value)
                            <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Nhà cung cấp</label>
                    <select name="InputSupplierId" class="form-control" required>
                        <option value=""> -- Chọn --</option>
                        @php($get_suppliers = DB::table('suppliers')->get())
                        @foreach($get_suppliers as $get_supplier)
                            <option value="{{ $get_supplier->id }}">{{ $get_supplier->supplier_name }}</option>
                        @endforeach
                    </select>
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

{{--<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--      <div class="modal-content">--}}
{{--        <div class="modal-header">--}}
{{--          <h5 class="modal-title">Bạn chắc chắn muốn xóa</h5>--}}
{{--            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                <span aria-hidden="true"> <i class="fas fa-times-hexagon"></i></span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        <div class="modal-footer">--}}
{{--          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>--}}
{{--          <button type="button" class="btn btn-danger">Xóa</button>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}

<script>
    // Disable form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

@endsection
