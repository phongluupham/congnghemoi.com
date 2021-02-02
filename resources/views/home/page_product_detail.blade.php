@extends('layout.layout')

@section('title', 'Chi tiết sản phẩm')

{{--  Nội dung trang web  --}}
@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit text-center" >
                    <h2 style="color: white; margin-top: 15px" ><b>CHI TIẾT SẢN PHẨM</b></h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Tìm kiếm sản phẩm</h2>
                    <form action="{{url('search-product')}}" method="get">
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm..." required>
                        @csrf
                        <input type="submit" value="Tìm kiếm">
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="{{url('public/upload_imagesproduct/'.$view_detail_product->product_image)}}" style="width: 295px">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name">{{ $view_detail_product->product_name }}</h2>
                                <div class="product-inner-price">
                                    <ins>{{ number_format($view_detail_product->product_price) }} VND/{{ $view_detail_product->product_unitprice }}</ins>
                                </div>

                                @if(!Auth::check())

                                    <form action="#" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="button" onclick="myFunction()">Thêm vào giỏ hàng
                                        </button>
                                    </form>

                                @else

                                    <form action="{{ url('add-to-cart/'.Auth::id().'/'.$view_detail_product->id) }}" class="cart" method="POST">
                                        @csrf
                                        <div class="quantity">
                                            <input type="number" class="input-text qty text" title="Số lượng" value="1" name="inputQuality" min="1" step="1">
                                        </div>
                                       <button class="add_to_cart_button" type="submit">
                                           Thêm vào giỏ hàng
                                       </button>
                                    </form>

                                @endif

                                <div class="product-inner-category">
                                    <p>
                                        Loại:
                                        @foreach($get_categorys as $get_category)
                                        <a href="{{url('page-category-index/'.Str::slug($get_category->category_name).'/'.$get_category->id)}}">
                                            @php($get_cates = DB::table('categories')->where('id', $view_detail_product->category_id)->first())
                                            {{ $get_cates->category_name }}
                                        </a>
                                        @endforeach
                                    </p>
                                </div>

                                <div role="tabpanel">
                                    <ul class="product-tab" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô Tả</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Nhà Cung Cấp</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">

                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <h2>Mô tả Sản phẩm</h2>
                                            <p>{{ $view_detail_product->product_discribe }}</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile">
                                            @php($get_suppliers = DB::table('product__suppliers')->where('product_id','=',$view_detail_product->id)->get())
                                            @foreach($get_suppliers as $get_supplier)
                                            @php($suppliers = DB::table('suppliers')->where('id', '=', $get_supplier->supplier_id)->get())
                                            @foreach($suppliers as $supplier)
                                            <h2>Nhà cung cấp</h2>
                                            <p class="text-danger">{{$supplier->supplier_name}}</p>
                                            <h2>Mô tả</h2>
                                            <p>{{$supplier->supplier_discribe}}</p>
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Sản phẩm liên quan</h2>
                        <div class="related-products-carousel">
                            @foreach($get_categorys as $get_category)
                                @php($get_products = DB::table('products')
                                ->where([['id','<>',$view_detail_product->id], ['category_id','=',$get_category->id]])->get())
                                @foreach($get_products as $get_product)
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img src="{{url('public/upload_imagesproduct/'.$get_product->product_image)}}">
                                            <div class="product-hover">
                                                @if (Auth::check())
                                                    <a href="{{ url('add-cart/'.Auth::user()->id.'/'.$get_product->id) }}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                                @else
                                                    <a href="{{ url('page-login') }}" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                                @endif
                                                <a href="{{ url('page-product-detail/'.Str::slug($get_product->product_name).'/'.$get_product->id) }}" class="view-details-link"><i class="fa fa-link"></i> Chi tiết</a>
                                            </div>
                                        </div>
                                        <h2><a href="">{{ $get_product->product_name }}</a></h2>
                                        <div class="product-carousel-price">
                                            <ins>{{ number_format($get_product->product_price) }} VND/{{ $get_product->product_unitprice }}</ins>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function myFunction() {
        if (confirm("Bạn chưa đăng nhập. Vui lòng đăng nhập để mua hàng!")) {
            location.href = '{{ url('page-login') }}';
        }
    }
</script>

@endsection
