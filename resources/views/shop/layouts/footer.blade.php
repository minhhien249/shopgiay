<footer class="black-bg">
    <div class="footer-middle-area">
        <div class="container">
            <div class="row mtn-30">
                <div class="col-lg-6 col-sm-12">
                    <div class="address-block mt-30">
                        <div class="footer-logo">
                            <a href="index.html">
                            <img src="{{asset($settings->image)}}" alt="Brand Logo">
                            </a>
                        </div>
                        <address class="address-info d-flex align-items-center">
                            <i class="fa fa-map-marker"></i>
                            <p><span>Địa Chỉ : </span>{{ $settings->address }}.</p>
                        </address>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <address class="address-info email mt-30">
                        <i class="fa fa-envelope"></i>
                        <p><span>EMAIL : </span><a href="emailto:{{ $settings->email }}">{{ $settings->email }}</a></p>
                    </address>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <address class="address-info email mt-30">
                        <i class="fa fa-phone"></i>
                        <p><span>PHONE : </span><a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a></p>
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="footer-link">

                    <a href="{{route('shop.dieu-khoan')}}">ĐIỀU KHOẢN </a>
                        <a href="#">ADVANCED SEARCH</a>

                    <a href="{{route('shop.contact')}}">LIÊN HỆ</a>
                    </div>
                    <p class="copyright">
                        Copyright <a href="#">Pullman</a>. All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
