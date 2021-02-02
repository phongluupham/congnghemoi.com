@extends('layout.layout')

@section('title', 'Giỏ hàng')

{{--  Nội dung trang web  --}}
@section('content')
<div class="single-promo promo4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-title text-left">
                    <h1 style="color: blue;"><b>GIỎ HÀNG</b></h2>
                </div>

            </div>
        </div>
    </div>
</div> <!-- End Page title area -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="product-content-right">
                    @if ($show_carts->count() > 0)
                        <div class="woocommerce">

                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng</th>
                                    <th colspan="2">Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sub_total = 0; ?>
                                @foreach($show_carts as $show_cart)
                                    @php($get_products = DB::table('products')->where('id', $show_cart->product_id)->first())

                                    <form method="post" action="{{ url('update-cart/'.Auth::id().'/'.$show_cart->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                                         src="{{ url('public/upload_imagesproduct/'.$get_products->product_image) }}">
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <a href="#">{{ $get_products->product_name }}</a>
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">
                                                    <b>{{ number_format($get_products->product_price) }} VND/{{ $get_products->product_unitprice }}</b>
                                                </span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="number" size="5" name="inputQuality" class="input-text qty text" value="{{ $show_cart->quality }}" min="1" step="1">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <?php
                                                    $price = $get_products->product_price;
                                                    $quality = $show_cart->quality;
                                                    $total = $price * $quality;

                                                    $sub_total = $sub_total + $total;
                                                ?>
                                                <span class="amount"><b>{{ number_format($total) }}/VND</b></span>
                                            </td>

                                            <td>
                                                <button type="submit" class="btn btn-primary btn-sm" title="Cập nhật"><i class="fa fa-refresh"></i></button>
                                            </td>

                                            <td>
                                                <a href="{{url('delete-cart/'.$show_cart->id)}}" style="width: 50px; height: 40px" title="Xóa" class="btn btn-danger btn-sm" ><i class="fa fa-times-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="cart-collaterals">
                                <div class="cart_totals ">
                                    <h2 style="color: darkblue">Tổng số giỏ hàng</h2>
                                    <table cellspacing="0">
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tổng phụ giỏ hàng</th>
                                            <td><span class="amount"><b>{{ number_format($sub_total) }}</b> VND</span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Vận chuyển và Xử lý</th>
                                            <td>
                                                <b><?php
                                                    if ($sub_total >= 200000) {
                                                        echo "Miễn phí Ship";
                                                    }else{
                                                        $total_price = 25000;
                                                        echo number_format($total_price). " VND";
                                                    }
                                                    ?></b>
                                            </td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Tổng đơn hàng</th>
                                            <td>
                                                <strong>
                                                    <span class="amount">
                                                    <b><?php
                                                        if ($sub_total >= 200000) {
                                                            echo $sub_total. " VND";
                                                        }else{
                                                            $total_price = 25000;
                                                            echo number_format($total_price + $sub_total). " VND";
                                                        }
                                                        ?></b>
                                                    </span>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <a href="{{ url('page-checkout/'.Auth::id()) }}" class="btn btn-info btn-block">
                                                    Thanh toán
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="alert alert-danger text-center" role="alert">
                            <strong><h3>Giỏ hàng của bạn không có sản phẩm</h3></strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
