@extends('shop.layouts.main')
@section('content')
<!-- blog main wrapper start -->
        <div class="blog-main-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-item-wrapper">
                            <!-- blog item wrapper end -->
                            <div class="row mbn-30">
                            	@foreach($blogs as $blog)
                                <div class="col-md-6">
                                    <!-- blog post item start -->
                                    <div class="blog-post-item d-block mb-30">
                                        <div class="blog-thumb w-100">
                                            <a href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">
                                                <img src="/assets/img/blog/blog-1.jpg" alt="blog thumb">
                                            </a>
                                        </div>
                                        <div class="blog-content w-100 pl-0 mt-20">
                                            <h6 class="blog-title">
                                                <a href="{{route('shop.blog',
                                ['slug'=>$blog->slug,'id'=>$blog->id])}}">{{$blog->title}}</a>
                                            </h6>
                                            <div class="blog-meta">
                                                <span><i class="fa fa-calendar"></i>{{$blog->created_at}}</span>
                                                
                                            </div>
                                            <p class="blog-desc">{!! strip_tags(Str::limit($blog->description,100)) !!}</p>
                                            <a class="btn read-more" href="{{route('shop.blog',
                                			['slug'=>$blog->slug,'id'=>$blog->id])}}">Read More</a>
                                        </div>
                                    </div>
                                    <!-- blog post item end -->
                                </div>
                                @endforeach
                                
                            </div>
                            <!-- blog item wrapper end -->

                            <!-- start pagination area -->
                            <div class="paginatoin-area shadow-bg text-center">
                                <ul class="pagination-box">
                                    <li><a class="previous" href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog main wrapper end -->
@endsection