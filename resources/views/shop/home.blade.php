@extends('shop.layouts.main')

@section('content')

<!-- slider area start -->
<section class="hero-slider hero-slider--style-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                    <!-- single slider item start -->
                    @foreach($banners as $banner)
                    <div class="hero-single-slide">

                        <div class="hero-slider-item bg-img" data-bg="{{$banner->image}}">
                        </div>

                    </div>
                    @endforeach
                    <!-- single slider item start -->
                </div>

            </div>
            <div class="col-md-4 mtn-30 mtsm-0">
                <div class="banner-statistics mt-30">
                    <a href="#">
                        <img src="shop/assets/img/banner/cms_3.3.jpg" alt="banner thumb">
                    </a>
                </div>
                <div class="banner-statistics mt-30">
                    <a href="#">
                        <img src="shop/assets/img/banner/cms_3.2.jpg" alt="banner thumb">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider area end -->



<!-- service policy start -->
<section class="service-policy mt-30">
    <div class="container">
        <div class="row row-10">
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block text-center">
                    <div class="policy-icon">
                        <i class="fa fa-heart-o"></i>
                    </div>
                    <div class="policy-text">
                        <h4 class="policy-title">Great Value</h4>
                        <p class="policy-desc">Nunc id ante quis tellus faucibus dictum in eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block text-center">
                    <div class="policy-icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="policy-text">
                        <h4 class="policy-title">Worlwide Delivery</h4>
                        <p class="policy-desc">Nunc id ante quis tellus faucibus dictum in eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block text-center">
                    <div class="policy-icon">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="policy-text">
                        <h4 class="policy-title">Safe Payment</h4>
                        <p class="policy-desc">Nunc id ante quis tellus faucibus dictum in eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="policy-block text-center">
                    <div class="policy-icon">
                        <i class="fa fa-headphones"></i>
                    </div>
                    <div class="policy-text">
                        <h4 class="policy-title">24/7 Help Center</h4>
                        <p class="policy-desc">Nunc id ante quis tellus faucibus dictum in eget metus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- service policy end -->




{{-- /////////////////Product///////////////////////// --}}
<!-- Related product area start -->
<section class="product-gallery section-padding">
    <div class="container">

        <div class="row mt-3">
            <div class="col-12">
                <h2 class="left-title d-flex justify-content-center mb-4">SẢN PHẨM MỚI</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel--4 slick-row-5 slick-arrow-style">
                    <!-- product single item start -->
                    @foreach ($products as $product)
                    <div class="product-item ">
                        <div class="product-thumb ">
                            <a href="{{ route('shop.product', ['category' => $product->category->slug , 'slug' => $product->slug , 'id' => $product->id]) }}"
                                title="{{ $product->name }}">
                                <img src="{{ asset($product->image)  }}" alt="product thumb" class="">
                            </a>

                            <div class="product-label">
                                <span>new</span>
                            </div>
                            <div class="discount-label">
                                <span>-10% Off</span>
                            </div>
                        </div>
                        <div class="product-content ">
                            <div class="product-caption">
                                <h6 class="product-name" style="height: 100px">
                                    <a href="product-details.html">{{$product->name }}</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-old"><del>
                                            {{ number_format($product->price,0,",",".") }}đ
                                        </del></span>
                                    <span class="price-regular">
                                        {{  number_format($product->sale,0,",",".") }}đ
                                    </span>
                                </div>
                                <a class="add-to-cart" onclick="AddCart({{$product->id}})" href="javascript:"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                            <div class="ratings">
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- product single item end -->
                </div>

            </div>
        </div>

    </div>

</section>
<section class="product-gallery section-padding">
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <h2 class="left-title d-flex justify-content-center mb-4">SẢN PHẨM BÁN CHẠY</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-carousel--4 slick-row-5 slick-arrow-style">
                    <!-- product single item start -->
                    @foreach ($hotProducts as $product)
                    <div class="product-item ">
                        <div class="product-thumb ">
                            <a href="{{ route('shop.product', ['category' => $product->category->slug , 'slug' => $product->slug , 'id' => $product->id]) }}"
                                title="{{ $product->name }}" title="{{ $product->name }}">
                                <img src="{{ asset($product->image)  }}" alt="product thumb" class="">
                            </a>
                            <!--
                                    <div class="product-label">
                                        <span>Hot</span>
                                    </div> -->
                            <div class="discount-label">
                                <span>Hot</span>
                            </div>
                        </div>
                        <div class="product-content ">
                            <div class="product-caption">
                                <h6 class="product-name" style="height: 100px">
                                    <a href="product-details.html">{{$product->name }}</a>
                                </h6>
                                <div class="price-box">
                                    <span class="price-old"><del>
                                            {{ number_format($product->price,0,",",".") }}đ
                                        </del></span>
                                    <span class="price-regular">
                                        {{  number_format($product->sale,0,",",".") }}đ
                                    </span>
                                </div>
                                <a class="add-to-cart" onclick="AddCart({{$product->id}})" href="javascript:"><i
                                        class="fa fa-shopping-cart"></i></a>
                            </div>
                            <div class="ratings">
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- product single item end -->
                </div>

            </div>
        </div>
    </div>

</section>
<!-- Related product area end -->


{{-- //////////////////////Blog/////////////////////////////////////// --}}
<!-- latest blog area start -->
<section class="latest-blog-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h3 class="title">TIN TỨC MỚI NHẤT</h3>
                    <!-- <h4 class="sub-title">Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius
                        claritas est etiam processus dynamicus, qui sequitur mutationem.</h4> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-carousel-active slick-row-5 slick-arrow-style">
                    @foreach ($newblogs as $blog)
                    <!-- blog single post start -->
                    <div class="blog-slide-item">
                        <div class="blog-post-item">
                            <div class="blog-thumb">
                                <a href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">
                                    <img src="shop/shop/assets/img/blog/blog-1.jpg" alt="blog thumb">
                                </a>
                            </div>
                            <div class="blog-content">
                                <h6 class="blog-title">
                                    <a href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">{{$blog->title}}</a>
                                </h6>
                                <div class="blog-meta">
                                    <span><i class="fa fa-calendar"></i>{{$blog->created_at}}</span>
                                    
                                </div>
                                <p class="blog-desc">{!! strip_tags(Str::limit($blog->description,60)) !!}</p>
                                <a class="btn read-more" href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">Đọc tiếp</a>
                            </div>
                        </div>
                    </div>
                    <!-- blog single post end -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- latest blog area end -->
@endsection