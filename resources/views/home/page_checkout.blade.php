@extends('layout.layout')

@section('title', 'Thanh toán')

{{--  Nội dung trang web  --}}
@section('content')
<div class="single-promo promo4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-title text-left">
                    <h2 style="color: blue;"><b>THANH TOÁN</b></h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif
                <div class="woocommerce-info">
                    <p>Họ và tên: {{Auth::user()->fullname}}</p>
                    <p>Số điện thoại: {{Auth::user()->phone}}</p>
                    <p>Email: {{ Auth::user()->email}}</p>
                    <p>
                        Địa chỉ: {{ Auth::user()->address }}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Thay đổi</button>
                    </p>
                </div>
            </div>

            <div class="col-md-7">
                <div class="product-content-right">
                    <div class="woocommerce">

                        <form enctype="multipart/form-data" action="{{ url('payment/'.Auth::id()) }}" class="checkout" method="post" name="checkout">
                            @csrf
                            <div id="order_review" style="position: relative;">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-thumbnail">Hình ảnh</th>
                                        <th class="product-name">Tên sản phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity">Số lượng</th>
                                        <th class="product-subtotal">Tổng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $sub_total = 0; ?>
                                    @foreach($get_carts as $show_cart)
                                        @php($get_products = DB::table('products')->where('id', $show_cart->product_id)->first())
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
                                                        <b>{{ $show_cart->quality }} Ký</b>
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
                                                        <input type="hidden" name="InputTotalPriceSingle" value="{{$total}}">
                                                </td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <table class="shop_table">

                                    <tfoot>

                                        <tr class="cart-subtotal">
                                            <th>Tổng phụ giỏ hàng</th>
                                            <td>
                                                <span class="amount"><b>{{ number_format($sub_total) }}</b> VND</span>
                                            </td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Vận chuyển và Xử lý</th>
                                            <td>
                                                <b><?php
                                                    if ($sub_total >= 200000) {
                                                        echo "Miễn phí Ship";
                                                    }else{
                                                        $price_delivery = 25000;
                                                        echo number_format($price_delivery). " VND";
                                                    }
                                                    ?></b>
                                            </td>
                                        </tr>


                                        <tr class="order-total">
                                            <th>Tổng đơn hàng</th>
                                            <td>
                                                <strong>
                                                    <span class="amount">
                                                    <b>
                                                        @if ($sub_total >= 200000)
                                                            <b>{{ number_format($sub_total) }} VND</b>
                                                            <input type="hidden" name="inputTotalPrice" value="{{ $sub_total }}">
                                                        @else
                                                            <b>
                                                                <?php
                                                                $price_delivery = 25000;
                                                                $total_payment = $price_delivery + $sub_total;
                                                                echo number_format($total_payment). " VND";
                                                                ?>
                                                            </b>
                                                            <input type="hidden" name="inputTotalPrice" value="{{ $total_payment }}">
                                                        @endif
                                                    </span>
                                                </strong>
                                            </td>
                                        </tr>

                                    </tfoot>
                                </table>

                                <div id="payment">
                                    <div class="form-row place-order">
                                        <input type="submit" value="Đặt hàng" id="place_order"
                                        name="woocommerce_checkout_place_order" class="button alt">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      <form action="{{ url('change-address-user/'.Auth::id()) }}" method="post">
          @csrf
          @method('PUT')
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Thay đổi địa chỉ</h4>
          </div>
          <div class="modal-body">
            <textarea name="inputAddress" cols="70" rows="2" placeholder="Thay đổi địa chỉ...">{{ Auth::user()->address }}</textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default">Lưu</button>
          </div>
        </div>
      </form>

  </div>
</div>


@endsection
