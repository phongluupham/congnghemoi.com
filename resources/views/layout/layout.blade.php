<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ url('public/home/img/logo/logo.png') }}"/>
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ url('public/home/css/bootstrap.min.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('public/home/css/font-awesome.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('public/home/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('public/home/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('public/home/css/responsive.css') }}">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <style type="text/css" media="screen">
        table {
            margin: 5;
            padding: 0;
            width: 100%;
            table-layout: auto;

        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .10em;
        }

        table th,
        table td {
            padding: .200em;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        table th {
            font-size: 12px;
            text-transform: uppercase;
            color: black;font-weight: bold;
        }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
                width: 100%;
            }

            table thead {
                clip: rect(0 0 0 0);
                height: 1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
            }

            table tr {
                display: block;
                margin-bottom: 15px;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .6em;
                text-align: right;

            }

            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
                border: 1px solid #ddd;
            }
        }
        .button3{
            background: blue;
            padding:1.2em 1.4em;
            font-size:12px;
            margin:5px;
            border:none;
            border-radius:10px;
            box-shadow:0 5px gray;
            cursor:pointer;
            outline:none;
        }
        .button3:active{
            transform:translate(0,4px);
            box-shadow:0 2px gray;
        }
    </style>

    <style>
        input[type="search"] {
            width: 150px;
            box-sizing: border-box;
            border: 1px solid darkgreen;
            border-radius: 4px;
            outline:none;
            padding: 10px 12px;

            transition:0.6s ease-in-out;
          }
        input[type="search"]:focus{
            width:500px;
            background-color:lightgreen;
        }
        .cart{
            display: none;
        }
    </style>

    <style>
        @-webkit-keyframes my {
            0% { color:red; }
            50% { color:  yellow; }
            100% { color:red; }
            }
            {{--  @-moz-keyframes my {
            0% { color: red; }
            50% { color:  yellow; }
            100% { color: red; }
            }  --}}
            @-o-keyframes my {
            0% { color: red; }
            50% { color:  yellow; }
            100% { color: red; }
            }
            @keyframes my {
            0% { color: red; }
            50% { color: yellow; }
            100% { color: red; }
            }
            .test {
              background:white;
              font-size:24px;
              font-weight:bold;
              -webkit-animation: my 700ms infinite;
              -moz-animation: my 700ms infinite;
              -o-animation: my 700ms infinite;
              animation: my 700ms infinite;
              }

        @media screen and (max-width: 600px) {
            table {
                border: 0;
                width: 100%;
            }

            table thead {
                clip: rect(0 0 0 0);
                height: 1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
            }

            table tr {
                display: block;
                margin-bottom: 15px;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .6em;
                text-align: right;

            }

            table td::before {
                /*
                * aria-label has no advantage, it won't be read inside a table
                content: attr(aria-label);
                */
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
                border: 1px solid #ddd;
            }
            .shopping-item{
                display: none;
            }
            .form-search{
                display: none;
            }
        }
    </style>


  </head>
  <body>

    <div class="header-area" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="user-menu">
                        <ul>
                            @if (Auth::check())
                                <li><a href="{{url('page-infor-user/'.Auth::user()->id)}}"><i class="fa fa-user"></i><b>{{Auth::user()->username}}</b></a></li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-toggle="modal" data-target="#modelIdlogout2">
                                        <p><i class="fa fa-sign-out"></i><b>Đăng xuất</b></p>
                                    </a>
                                </li>
                            @else
                                <li><a href="{{ url('page-register') }}"><i class="fa fa-user"></i> Đăng ký</a></li>
                                <li><a href="{{ url('page-login') }}" ><i class="fa fa-user"></i> Đăng nhập</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="{{url('/')}}"><img src="{{ url('public/home/img/logo/logo.png') }}" style="max-width: 100%;height:100px;"></a></h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        @if (Auth::check())
                            <a href="{{ url('page-shopping-cart/'.Str::slug(Auth::user()->username).'/'.Auth::id()) }}">
                                Giỏ hàng
                                <i class="fa fa-shopping-cart"></i>
                                @php($count_cart_user = DB::table('shopping_carts')->where('user_id', Auth::id())->count())
                                <span class="product-count">{{ $count_cart_user }}</span>
                            </a>
                        @else
                            <a href="#">Giỏ hàng<i class="fa fa-shopping-cart"></i>
                                <span class="product-count">0</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar-Cart">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                    </button>

                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <div class="navbar-nav">
                        <ul class="nav navbar-nav" >
                            <li ><a href="{{ url('/') }}"><b style="color: rgb(5, 90, 41)">Trang chủ</b></a></li>
                            <li ><a href="{{ url('page-list-product') }}"><b style="color: rgb(5, 90, 41)">Cửa hàng</b></a></li>
                            <li ><a href="#C4"><b style="color: rgb(5, 90, 41)">Tin tức</b></a></li>
                            <li>
                                <form action="{{url('search-product')}}" method="get" class="form-search">
                                    <input type="search" name="search" placeholder="Tìm kiếm sản phẩm" style="margin-top: 10px" required>
                                    <span class="form-group-btn">
                                    <button type="submit" class="btn-success"><i class="fa fa-search"></i></button>
                                    </span>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="Navbar-Cart">
                    <div class="navbar-nav">
                        <p class="cart">Đây là giỏ hàng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @yield('content')





    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="footer-about-us">
                        <h2>F<span>Fruit</span></h2>
                        <p>Trang web buôn bán sản phẩm nông nghiệp chất lượng, giá cả phù hợp, sản phẩm tươi ngon</p>
                    </div>
                </div>


                <div class="col-md-3"></div>
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Loại sản phẩm</h2>
                        <ul>
                            @php($get_category_tao = DB::table('categories')->where('id',4)->first())
                            <li><a href="{{url('page-category-index/'.Str::slug($get_category_tao->category_name).'/'.$get_category_tao->id)}}">{{$get_category_tao->category_name}}</a></li>
                            @php($get_category_mit = DB::table('categories')->where('id',5)->first())
                            <li><a href="{{url('page-category-index/'.Str::slug($get_category_mit->category_name).'/'.$get_category_mit->id)}}">{{$get_category_mit->category_name}}</a></li>
                            @php($get_category_nho = DB::table('categories')->where('id',6)->first())
                            <li><a href="{{url('page-category-index/'.Str::slug($get_category_nho->category_name).'/'.$get_category_nho->id)}}">{{$get_category_nho->category_name}}</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End footer top area -->


    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        &copy;
                        <span id="year"></span>
                        <script>
                            var d = new Date();
                            var n = d.getFullYear();
                            document.getElementById("year").innerHTML = n;
                        </script>
                        All Rights Reserved
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="{{ url('public/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('public/home/js/jquery.sticky.js') }}"></script>

    <!-- jQuery easing -->
    <script src="{{ url('public/home/js/jquery.easing.1.3.min.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ url('public/home/js/main.js') }}"></script>

    <!-- Slider -->
    <script type="text/javascript" src="{{ url('public/home/js/bxslider.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('public/home/js/script.slider.js') }}"></script>
  </body>

  <div class="modal fade" id="modelIdlogout2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-body">
                  Bạn có muốn đăng xuất không ?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                  <a href="{{ url('logout') }}" class="btn btn-primary">Đăng xuất</a>
              </div>
          </div>
      </div>
  </div>
</html>
