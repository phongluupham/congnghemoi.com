@extends('layout.layout')

@section('title', 'Trang sản phẩm')

{{--  Nội dung trang web  --}}
@section('content')


<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 style="color: green"><b> CỬA HÀNG </b></h1>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">

        <div class="row">
            @foreach($show_product_all as $show_product)
            <div class="col-md-3">
                <div class="single-shop-product">
                    <div class="product-upper">
                        <img src="{{url('public/upload_imagesproduct/'.$show_product->product_image)}}">
                    </div>
                    <h2><a href="{{ url('page-product-detail/'.Str::slug($show_product->product_name).'/'.$show_product->id) }}">{{$show_product->product_name}} </a></h2>
                    <div class="product-carousel-price">
                        <ins>{{number_format($show_product->product_price)}}VND/{{$show_product->product_unitprice}}</ins>
                    </div>
                        @if ($show_product->product_quality == 0)
                        <div class="product-option-shop">
                            <button class="text-danger" disabled>Đã hết hàng</button>
                        </div>
                    @else
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" href="{{ url('add-cart/'.Auth::id().'/'.$show_product->id)}}">
                                Thêm vào giỏ
                            </a>
                        </div>
                        @endif

                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <ul class="pagination justify-content-center pagination-sm mt-2">
                        {{ $show_product_all->links() }}
                    </ul>
                </div>
            </div>
        </div>



    </div>
</div>


@endsection
