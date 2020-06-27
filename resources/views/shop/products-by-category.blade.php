@extends('shop.layouts.main')

@section('content')
<div class="breadcrumb-area  " >
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb mt-2">
                            <li class="breadcrumb-item"><a href="/" class="text-secondary"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a class="text-secondary" href="javascript:void(0)">/</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a class="text-secondary" href="{{ route('shop.category', ['slug' => $cate->slug]) }}">{{$cate->name}}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <!-- sidebar area start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <aside class="sidebar-wrapper">
                            <!-- single sidebar start -->
                            <div class="sidebar-single">
                                <form action="{{url('danh-muc/'.$cate->slug.'/filter')}}" method="GET">
                            <h6 class="sidebar-title">Hãng</h6>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container search-list">
                                        @foreach($brandsFilter as $product)
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="brandCheck{{$product->brand_id}}" name="brand_id[]" value="{{$product->brand_id}}">
                                                <label class="custom-control-label" id="brandCheck{{$product->brand_id}}" for="brandCheck{{$product->brand_id}}">{{$product->name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                            <h6 class="sidebar-title pt-4">Giá</h6>
                                <div class="sidebar-body">
                                    <ul class="checkbox-container search-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" class="custom-control-input" id="priceCheck1" name="price" value="0-3000000">
                                                <label class="custom-control-label" id="priceCheck1" for="priceCheck1">Dưới 3tr</label>
                                            </div>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" class="custom-control-input" id="priceCheck2" name="price" value="3000000-6000000">
                                                <label class="custom-control-label" id="priceCheck1" for="priceCheck2">Từ 3tr - 6tr</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" class="custom-control-input" id="priceCheck3" name="price" value="6000000-9000000">
                                                <label class="custom-control-label" id="priceCheck1" for="priceCheck3">Từ 6tr - 9tr</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="radio" class="custom-control-input" id="priceCheck5" name="price" value="9000000">
                                                <label class="custom-control-label" id="priceCheck1" for="priceCheck5">Trên 9tr</label>
                                            </div>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                            <!-- single sidebar start -->
                            <div class="sidebar-banner">
                                <div class="banner-thumb">
                                    <a href="#">
                                        <img src="assets/img/banner/sidebar-banner.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- single sidebar end -->
                        </aside>
                    </div>
                    <!-- sidebar area end -->
                    <!-- shop main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            {{-- <div class="product-amount">
                                                <p>Showing 1–16 of 21 results</p>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Relevance</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    <option value="rating">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="price-asc">Model (A - Z)</option>
                                                    <option value="price-asc">Model (Z - A)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->
                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30" id="productData">
                                <!-- product single item start -->

                                @foreach ($products as $product)
                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <div class="product-thumb">
                                        <a href="{{route('shop.product',['slug'=>$product->slug,'id'=>$product->id])}}">
                                            <img src="{{asset($product->image)}}" alt="product thumb">
                                            </a>
                                            <div class="product-label">
                                                <span>new</span>
                                            </div>
                                            <div class="discount-label">
                                                <span>-10% Off</span>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-caption">
                                                <h6 class="product-name">
                                                <a href="{{route('shop.product',['slug'=>$product->slug,'id'=>$product->id])}}">{{$product->name}}</a>
                                                </h6>
                                                <div class="price-box">
                                                <span class="price-old"><del>{{ number_format($product->price,0,",",".") }} <span style="text-transform: lowercase">đ</del></span>
                                                    <span class="price-regular">{{ number_format($product->sale,0,",",".") }} <span style="text-transform: lowercase">đ</span>
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
                                    <!-- product grid end -->
                                </div>
                                @endforeach
                                <!-- product single item start -->
                            </div>
                            <!-- product item list wrapper end -->
                            <!-- start pagination area -->

                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

 @endsection
 @section('js')
 <script>
    $(document).ready(function () {
        $(".custom-control-input").click( function(){
            var brand = [];
            var price = [];
            $.each($("input[name='brand_id[]']:checked"), function(){
                brand.push($(this).val());
            });
            $.each($("input[name='price']:checked"), function(){
                price.push($(this).val());
            });

                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '{{url('danh-muc/'.$cate->slug.'/filter')}}', // url
                    data: 'brand_id=' + brand + '&price='+price,
                    success: function(response){ // Nếu thành công trả về
                        $("#productData").html(response);
                    }

                });

        });
    });
    </script>
 @endsection
