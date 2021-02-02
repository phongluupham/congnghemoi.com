@extends('layout.layout')

@section('title', 'Trang kết quả tìm kiếm')

{{--  Nội dung trang web  --}}
@section('content')
 <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="product-title text-left" >
                <h5 style="color: black" class="text-left"><b>Tìm thấy {{$count}} Kết quả</b></h5>
            </div>
        </div>
    </div>
</div>
<hr>
 <div class="single-product-area">
     <div class="zigzag-bottom"></div>
         <div class="container">
            <div class="row">
                @forelse($show_searchs as $show_search)
                     <div class="col-md-3">
                         <div class="single-shop-product">
                             <div class="product-upper">
                                 <img src="{{url('public/upload_imagesproduct/'.$show_search->product_image)}}">
                             </div>
                             <h2><a href="{{ url('page-product-detail/'.Str::slug($show_search->product_name).'/'.$show_search->id) }}">{{$show_search->product_name}}</a></h2>
                             <div class="product-carousel-price">
                                 <ins>{{number_format($show_search->product_price)}}VND/{{$show_search->product_unitprice}}</ins>
                             </div>

                             <div class="product-option-shop">
                                 @if (Auth::check())
                                     <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{url('add-cart/'.Auth::user()->id.'/'.Str::slug($show_search->id))}}">Thêm vào giỏ</a>
                                 @else
                                     <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="{{url('page-login')}}">Thêm vào giỏ</a>>
                                 @endif
                             </div>
                         </div>
                   </div>
                @empty
                    <h3 class="text-danger col-md-12">
                        Không tìm thấy sản phẩm
                    </h3>

                @endforelse
           </div>
     </div>
 </div>

@endsection
