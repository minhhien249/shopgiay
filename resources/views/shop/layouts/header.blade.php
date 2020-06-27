<div class="main-header d-none d-lg-block">


    <!-- header middle area start -->
    <div class="header-middle-area p-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="white-bg">
                        <div class="row">
                            <!-- start logo area -->
                            <div class="col-lg-4">
                                <div class="logo-2">
                                    <a href="/">
                                        <img src="{{ asset($settings->image) }}" alt="Brand Logo">
                                    </a>
                                </div>
                            </div>
                            <!-- start logo area -->

                            <!-- mini cart area start -->
                            <div class="col-lg-8">
                                <div class="header-right">
                                    <div class="header-configure-area">
                                        <ul class="nav justify-content-between">
                                            <li class="header-call d-flex align-items-center">
                                                <div class="call-icon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                            <span>PHONE:<a href="tel:+880123456789">{{$settings->hotline}}</a></span>
                                            </li>
                                            <li class="search-wrapper-inner">
                                                <form action="{{ route('shop.search') }}" method="GET" class="search-box-2">
                                                    <input type="text" class="search-field-2" name="tu-khoa" placeholder="Nhập từ khóa tìm kiếm" value="{{ isset($keyword) ? $keyword : '' }}">
                                                    <button type="submit" class="search-btn-2"><i class="fa fa-search"></i></button>
                                                </form>
                                            </li>

                                             {{-- //////////cart//////////////////// --}}
                                            <div id="item-cart">
                                                <li class="mini-cart-wrap">
                                                    <a href="#" class="minicart-btn minicart-btn-style_2">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        @if(Session::has("Cart") !=null)
                                                            <span id="total-quanty-show" class="notification">{{Session::get("Cart")->totalQuanty}}</span>
                                                        @else
                                                            <span id="total-quanty-show" class="notification">0</span>
                                                        @endif
                                                    </a>
                                                    @if(Session::has("Cart") != null)
                                                    <div class="cart-list-wrapper">
                                                        <ul class="cart-list">
                                                            @foreach (Session::get('Cart')->products as $item)
                                                            {{-- {{dd($item)}} --}}
                                                            <li>
                                                                <div class="cart-img">
                                                                <a href="product-details.html"><img src="{{asset($item['productInfo']->image)}}" alt=""></a>
                                                                </div>
                                                                <div class="cart-info">
                                                                <h6 class="product-name"><a href="product-details.html">{{$item['productInfo']->name}}</a></h6>
                                                                    <span class="cart-qty">Số lượng:{{$item['quanty']}}</span>
                                                                    <span class="item-price">{{number_format($item['productInfo']->sale,0,",",".")}}đ</span>
                                                                </div>
                                                                <div class="del-icon">
                                                                    <i class="fa fa-times" data-id="{{$item['productInfo']->id}}"></i>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <ul class="minicart-pricing-box">

                                                            <li class="total">
                                                                <span>Tổng Tiền:</span>
                                                                <span><strong>{{number_format(Session::get('Cart')->totalPrice,0,",",".")}}đ</strong></span>
                                                                <input hidden id="total-quanty-cart" type="number" value="{{ Session::get('Cart')->totalQuanty }}">
                                                            </li>
                                                        </ul>
                                                        <div class="minicart-button">
                                                        <a href="{{route('shop.cart.add-view-cart')}}"><i class="fa fa-shopping-cart"></i> View Cart</a>
                                                        <a href="{{route('shop.cart.checkout')}}"><i class="fa fa-share"></i> Checkout</a>
                                                        </div>
                                                    </div>
                                                     @endif
                                                </li>


                                            </div>
                                            {{-- ///////////////// --}}

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- mini cart area end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header middle area end -->
</div>