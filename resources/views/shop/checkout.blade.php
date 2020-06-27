<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.hasthemes.com/pullman-preview/pullman/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Jun 2020 06:54:22 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pullman - eCommerce Bootstrap 4 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="shop/assets/img/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,600,700,800,900%7CPoppins:300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="shop/assets/css/vendor/bootstrap.min.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="shop/assets/css/vendor/font-awesome.min.css">
    <!-- Slick slider css -->
    <link rel="stylesheet" href="shop/assets/css/plugins/slick.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="shop/assets/css/plugins/animate.css">
    <!-- Nice Select css -->
    <link rel="stylesheet" href="shop/assets/css/plugins/nice-select.css">
    <!-- jquery UI css -->
    <link rel="stylesheet" href="shop/assets/css/plugins/jqueryui.min.css">
    <!-- main style css -->
    <link rel="stylesheet" href="shop/assets/css/style.css">

</head>

<body>






    <main>
        @if(Session('Cart'))
        @php
        $newCart = Session('Cart');
        $products = $newCart->products;
        $totalPrice = $newCart->totalPrice;
        $totalQuanty = $newCart->totalQuanty;
        $discount = $newCart->discount;
        $coupon = $newCart->coupon;
        $payment = $totalPrice - $discount;
        @endphp
        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Tóm Tắt Đơn Hàng Của Bạn</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="section-bg-color">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Cart Table Area -->
                                            <div class="cart-table table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <div class="cart-list-wrapper">
                                <div class="cart-list">
                                    @foreach (Session::get('Cart')->products as $item)
                                    <div class="d-flex mb-2">
                <div class="cart-img mr-3">
                    <img src="{{asset($item['productInfo']->image)}}" width="120px" alt="">
                </div>
                <div class="cart-info" style="width: 400px">
                    <h6 class="product-name"><p>{{$item['productInfo']->name}}</p></h6>
                    <span class="cart-qty">Số lượng:{{$item['quanty']}}</span>
                    </br>
                    <span class="item-price">{{number_format($item['productInfo']->sale,0,",",".")}}đ</span>
                </div>
                                    </div>
                                    @endforeach
                                </div>
                                                        </div>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Checkout Login Coupon Accordion Start -->
                                            <div class="checkoutaccordion" id="checkOutAccordion">
                                                <div class="card">
                                                    <h6><span data-toggle="collapse" data-target="#couponaccordion">Nhấn
                                                            vào đây để nhập mã giảm giá của bạn</span></h6>
                                                    <div id="couponaccordion" class="collapse"
                                                        data-parent="#checkOutAccordion">
                                                        <div class="card-body">
                                                            <div class="cart-update-option">
                                                                <div class="apply-coupon-wrapper">
                                                                    <form action="{{ route('shop.cart.check-coupon') }}"
                                                                        method="get" class=" d-block d-md-flex">
                                                                        <input value="{{ $coupon }}" type="text"
                                                                            name="coupon_code"
                                                                            placeholder="Nhập mã giảm giá" required />
                                                                        <button class="btn btn-sqr">Áp Dụng</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($errors->any())
                                                    @foreach ($errors->all() as $error)
                                                    <p style="text-align: right;color: red;">{{ $error }}</p>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Checkout Login Coupon Accordion End -->
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-lg-12 ml-auto">
                                            <!-- Cart Calculation Area -->
                                            <div class="cart-calculator-wrapper">
                                                <div class="cart-calculate-items">
                                                    <h6>Giỏ Hàng Của Bạn</h6>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <td>Tổng Số Lượng</td>
                                                                <td>{{ isset(Session::get('Cart')->totalQuanty) ? number_format(Session::get('Cart')->totalQuanty): '0'}}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="total">Tạm tính</td>
                                                                <td class="price">
                                                                    <span>{{ number_format($totalPrice ,0,",",".") }}
                                                                        đ</span>
                                                                </td>
                                                            </tr>
                                                            <tr class="total">
                                                                <td>Giảm Giá</td>
                                                                <td class="total-amount">
                                                                    {{ number_format($discount ,0,",",".") }} đ</td>
                                                            </tr>
                                                            <tr class="total">
                                                                <td>Tổng Giá</td>
                                                                <td class="total-amount">
                                                                    {{ number_format($payment ,0,",",".") }} đ</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <form method="post" action="{{ route('shop.cart.checkout') }}">
                            @csrf
                            <div class="checkout-billing-details-wrap">
                                <h5 class="checkout-title">Thông Tin Cá Nhân</h5>
                                <div class="billing-form-wrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-input-item">
                                                <label for="fullname" class="required">Họ Và Tên</label>
                                                <input type="text" class="form-control input-feild" id="fullname"
                                                    name="fullname" value="">
                                                @if ($errors->has('fullname'))
                                                <span class="invalid-feedback" role="alert"
                                                    style="color:red;">{{ $errors->first('fullname') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Email </label>
                                        <input type="text" class="form-control input-feild" id="contactEmail"
                                            name="email" value="">
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert"
                                            style="color:red;">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>



                                    <div class="single-input-item">
                                        <label for="address" class="required mt-20">Địa Chỉ</label>
                                        <textarea class="contact-text" name="address"></textarea>
                                        @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert"
                                            style="color:red;">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>


                                    <div class="single-input-item">
                                        <label for="phone">Số Điện Thoại</label>
                                        <input type="text" class="form-control input-feild" id="contactEmail"
                                            name="phone" value="">
                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert"
                                            style="color:red;">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>

                                    <div class="single-input-item">
                                        <label for="note">Lưu ý đặt hàng</label>
                                        <textarea class="contact-text" name="note"></textarea>
                                    </div>

                                </div>
                            </div>

                            <!-- Order Payment Method -->
                            <div class="order-payment-method mt-4">
                                <div class="single-payment-method show">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                                class="custom-control-input" checked />
                                            <label class="custom-control-label" for="cashon">Thanh toán khi giao
                                                hàng</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="cash">
                                        <p>Thanh toán bằng tiền mặt khi giao hàng.</p>
                                    </div>
                                </div>
                                <div class="single-payment-method">
                                    <div class="payment-method-name">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="directbank" name="paymentmethod" value="bank"
                                                class="custom-control-input" />
                                            <label class="custom-control-label" for="directbank">Chuyển khoản trực
                                                tiếp</label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="bank">
                                        <p>Quý khách có thể chuyển khoản vào stk sau:</p>
                                    </div>
                                </div>

                                <div class="single-payment-method">
                                    <div class="payment-method-details" data-method="paypal">
                                        <p>Thanh toán qua MOMO , bạn có thể thanh toán bằng thẻ tín dụng.</p>
                                    </div>
                                </div>
                                <div class="summary-footer-area">
                                    <button type="submit" class="btn btn-sqr">Đặt Hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Order Summary Details -->
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->

        @endif
    </main>


    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->



    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="shop/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <!-- jQuery JS -->
    <script src="shop/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <!-- Popper JS -->
    <script src="shop/assets/js/vendor/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="shop/assets/js/vendor/bootstrap.min.js"></script>
    <!-- slick Slider JS -->
    <script src="shop/assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="shop/assets/js/plugins/countdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="shop/assets/js/plugins/nice-select.min.js"></script>
    <!-- jquery UI JS -->
    <script src="shop/assets/js/plugins/jqueryui.min.js"></script>
    <!-- Image zoom JS -->
    <script src="shop/assets/js/plugins/image-zoom.min.js"></script>
    <!-- image loaded js -->
    <script src="shop/assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <!-- masonry  -->
    <script src="shop/assets/js/plugins/masonry.pkgd.min.js"></script>
    <!-- mailchimp active js -->
    <script src="shop/assets/js/plugins/ajaxchimp.js"></script>
    <!-- contact form dynamic js -->
    <script src="shop/assets/js/plugins/ajax-mail.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="shop/assets/js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="shop/assets/js/main.js"></script>
</body>


<!-- Mirrored from demo.hasthemes.com/pullman-preview/pullman/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Jun 2020 06:54:23 GMT -->

</html>