@extends('layout.layout')

@section('title', 'Trang sản phẩm theo loại')

{{--  Nội dung trang web  --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-title text-left" >
                    <h1 style="color: green" class="text-center"><b id="spmn"> Các Sản Phẩm Thuộc Loại {{$view_category->category_name}} </b></h1>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">

            <div class="row">

                @foreach($get_product_same_category as $data)
                    <div class="col-md-3">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <img src="{{url('public/upload_imagesproduct/'.$data->product_image)}}">
                            </div>
                            <h2><a href="{{ url('page-product-detail/'.Str::slug($data->product_name).'/'.$data->id) }}">{{$data->product_name}}</a></h2>
                            <div class="product-carousel-price">
                                <ins>{{number_format($data->product_price)}}VND/{{$data->product_unitprice}}</ins>
                            </div>

                            <div class="product-option-shop">
                                @if (Auth::check())
                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{url('add-cart/'.Auth::user()->id.'/'.Str::slug($data->id))}}">Thêm vào giỏ</a>
                                @else
                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{url('page-login')}}">Thêm vào giỏ</a>>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <ul class="pagination justify-content-center pagination-sm mt-2">
                            {{ $get_product_same_category->links() }}
                        </ul>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
