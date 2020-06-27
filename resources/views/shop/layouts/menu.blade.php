<div class="header-main-area sticky">
    <div class="container">
        <div class="row position-relative">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="category-toggle-wrap">
                            <div class="category-toggle">
                            <a href="/" class="text-white">Trang chủ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 position-static">
                        <!-- main menu area start -->
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                <nav class="desktop-menu">
                                    <ul>
                                        @if(!empty($categories))
                                        @foreach($categories as $category)
                                            @if($category->parent_id == 0)
                                        <li class="active"> <a href="{{ route('shop.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                        </a>
                                            <ul class="dropdown">
                                                @foreach($category->subcategory as $child)
                                                <li><a href="{{ route('shop.category', ['slug' => $child->slug]) }}">{{ $child->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                            @endif
                                        @endforeach
                                        @endif
                                        <li class="active"> <a href="{{ route('shop.blog-detalis') }}">Tin Tức</li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                        <!-- main menu area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
