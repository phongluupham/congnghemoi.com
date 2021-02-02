@extends('home.profile_user.layout_profile_user')
@section('tab-content')

<div class="tab-content">

    <div class="tab-pane show" id="about-me">

        @forelse($show_order_cancels as $show_order_cancel)
            <div class="panel panel-default">
                <div class="panel-heading"><b>Đơn hàng: 0{{ $show_order_cancel->id }}</b></div>
                <div class="panel-body" style="padding:1px;">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead>
                            <tr >
                                <th class="col-md-12 text-left" colspan="7">  </th>
                            </tr>
                            <tr>
                                <th bgcolor="red" style="color: white">STT</th>
                                <th bgcolor="red" style="color: white">Tên sản phẩm</th>
                                <th bgcolor="red" style="color: white">Hình ảnh</th>
                                <th bgcolor="red" style="color: white">Số lượng</th>
                                <th bgcolor="red" style="color: white">Tổng tiền</th>
                                <th bgcolor="red" style="color: white">Ngày đặt hàng</th>
{{--                                <th bgcolor="red" style="color: white">Ngày hủy</th>--}}
                                <th bgcolor="red" style="color: white">Tùy chọn</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 1; ?>
                            @php($show_cancel = DB::table('order_details')->where('order_id','=',$show_order_cancel->id)->get())
                            @foreach($show_cancel as $value)
                                @php($show_productcancel = DB::table('products')->where('id', $value->product_id)->get())
                                @forelse ($show_productcancel as $key => $data)
                                    <tr>
                                        <td><?php echo $stt++; ?></td>
                                        <td><h4>{{ $data->product_name }}</h4></td>
                                        <td>
                                            <img src="{{url('public/upload_imagesproduct/'.$data->product_image)}}"
                                                 width="100" height="100">
                                        </td>
                                        <td>{{number_format($value->total_quality)}}</td>
                                        <td>{{number_format($value->total_price)}}</td>
                                        <td>{{date('d/m/Y', strtotime($value->created_at))}}</td>
{{--                                        <td>{{date('d/m/Y', strtotime($value->updated_at))}}</td>--}}
                                        <td>
                                            <a href="{{ url('page-product-detail/'.$data->product_name.'/'.$data->id) }}" class="btn btn-success button3">Mua lại</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <b class="text-danger">Không có dữ liệu</b>
                                        </td>
                                    </tr>
                                @endforelse
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    @php($sum_prices = DB::table('order_details')->where('order_id',$show_order_cancel->id)->sum('total_price'))
                    <b style="color: red">Tổng tiền: {{ number_format($sum_prices) }}VND</b>
                </div>
            </div>
        @empty
            <div class="panel panel-default">
                <div class="panel-body">Không có đơn hàng</div>
            </div>
        @endforelse
    </div>

</div>
<!-- end tab-content -->

@endsection
