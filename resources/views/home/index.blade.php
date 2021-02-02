@extends('layout.layout')

@section('title', 'Trang chủ')

{{--  Nội dung trang web  --}}
@section('content')

    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                @foreach($show_sliders as $show_slider)
                <div class="col-md-3">
                    <li>
                        <img src="{{ url('public/upload_imagesslider/'.$show_slider->image_slider) }}">
                        <div class="caption-group">
                            <h2 class="caption title" style="color: lime">
                                {{ $show_slider->title_slider }}
                            </h2>
                            @php($get_products = DB::table('products')->where('id', $show_slider->product_id)->get())
                            @foreach($get_products as $get_product)
                            <a class="caption button-radius" href="{{ url('page-product-detail/'.Str::slug($get_product->product_name).'/'.$get_product->id) }}"><span class="icon"></span>Mua ngay</a>
                            @endforeach
                        </div>
                    </li>
                </div>
                @endforeach
            </ul>
        </div>
        <!-- ./Slider -->
    </div>
    <!-- End slider area -->


    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-money"></i>
                        <p>Giá cả phù hợp</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-apple"></i>
                        <p>Sản phẩm tươi ngon</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Thanh toán an toàn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End promo area -->

    <div class="maincontent-area" >
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-title text-left" >
                                        <h1 style="color: green" class="text-center"><b id="spmn"> SẢN PHẨM MỚI NHẤT </b></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-carousel">

                        @foreach($show_product_latests as $product_latests)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{url('public/upload_imagesproduct/'.$product_latests->product_image)}}" >
                                    <div class="product-hover">
                                        @if (Auth::check())
                                        <a href="{{ url('add-cart/'.Auth::user()->id.'/'.Str::slug($product_latests->id)) }}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        @else
                                            <a href="{{ url('page-login') }}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        @endif
                                        <a href="{{ url('page-product-detail/'.Str::slug($product_latests->product_name).'/'.$product_latests->id) }}" class="view-details-link"><i class="fa fa-link"></i> Chi tiết</a>
                                    </div>
                                </div>
                                <h2>
                                    <a href="{{ url('page-product-detail/'.Str::slug($product_latests->product_name).'/'.$product_latests->id) }}">
                                        {{ $product_latests->product_name }}
                                    </a>
                                </h2>

                                <div class="product-carousel-price">
                                    <ins>{{ number_format($product_latests->product_price) }} VND/{{ $product_latests->product_unitprice }}</ins>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main content area -->
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-title text-left" >
                    <h1 style="color: green" class="text-center"><b> LOẠI SẢN PHẨM </b></h1>
                </div>
            </div>
        </div>
    </div>




    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                  <div class="col-md-12">
                    <div class="brand-wrapper">
                        <div class="brand-list">
                            @foreach($show_category_all as $show_category)
                            <a href="{{url('page-category-index/'.Str::slug($show_category->category_name).'/'.$show_category->id)}}"> <img src="{{url('public/upload_images_category/'.$show_category->category_image)}}">
                                <h3 onmouseover="this.style.color = 'red'" onmouseout="this.style.color = 'lime'"
                                    style="color: lime" class="text-center">{{$show_category->category_name}}</h3>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End brands area -->
    <hr>




    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title"><b style="color: black">Bán chạy nhất</b></h2>
                        <div class="single-wid-product">
                            <a href="#"><img src="{{url('public/home/img/spbanchay.jpg')}}" alt="" class="product-thumb"></a>
                            <h2><a href="#">Táo Breeze New Zealand</a></h2>
                            <div class="product-wid-price">
                                <ins>100.000VND/Kg</ins>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title"><b style="color: black">Sản phẩm mới</b></h2>
                        @php($products = DB::table('products')->latest()->take(2)->get())
                        @foreach($products as $product)
                        <div class="single-wid-product">
                            <a href="{{ url('page-product-detail/'.Str::slug($product->product_name).'/'.$product->id) }}">
                                <img src="{{url('public/upload_imagesproduct/'.$product->product_image)}}" class="product-thumb">
                            </a>
                            <h2>
                                <a href="{{ url('page-product-detail/'.Str::slug($product->product_name).'/'.$product->id) }}">
                                    {{ $product->product_name }}
                                </a>
                            </h2>
                            <div class="product-wid-price">
                                <ins>{{ number_format($product->product_price) }} VND/{{ $product->product_unitprice }}</ins>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <hr>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-title text-left">
                    <h2 id="C4" style="color: green"><b> TIN TỨC TRONG NGÀY </b></h2>
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                         <a  href="https://vnexpress.net/trai-cay-rung-xuong-pho-chay-hang-4161032.html"> <h4 style="color: red" class="test">Trái cây rừng xuống phố 'cháy hàng'</h4></a>
                    </div>
                    <div>
                         <a  href="https://vietnamnet.vn/vn/kinh-doanh/thi-truong/gia-mit-thai-tang-manh-672767.html"> <h4 style="color: red" class="test">Giá mít Thái tăng vù vù, bán 1 trái to thu hơn nửa triệu đồng</h4></a>
                </div>
                </div>
            </div>
        </div>
    <!-- End product widget area -->
@endsection
