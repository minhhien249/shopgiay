
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
                                                <a class="add-to-cart" href="cart.html"><i class="fa fa-shopping-cart"></i></a>
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




