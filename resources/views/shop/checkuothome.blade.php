
@extends('shop.layouts.main')


@section('content')
<section class="main-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- BSTORE-BREADCRUMB START -->
                <div class="bstore-breadcrumb">
                    <a href="/">Trang chủ</a>
                    <span><i class="fa fa-caret-right"></i></span>
                </div>
                <!-- BSTORE-BREADCRUMB END -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="text-center"><i class="fa fa-opencart"></i> {{ session('msg') ? session('msg') : '' }}</h3>
            </div>
        </div>
    </div>
</section>
@endsection