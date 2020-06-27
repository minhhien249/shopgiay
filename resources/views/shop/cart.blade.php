@extends('shop.layouts.main')
@section('content')
        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                @if(Session::has("Cart") !=null)
                @if(Session::get('Cart')->totalQuanty !== null && Session::get('Cart')->totalPrice !== null)
                <div class="section-bg-color" id="list-cart">
                    <div class="row">
                        <div class="col-lg-12" >
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Ảnh Sản Phẩm</th>
                                            <th class="pro-title">Tên Sản Phẩm</th>
                                            <th class="pro-price">Giá</th>
                                            <th class="pro-quantity">Số Lượng</th>
                                            <th class="pro-subtotal">Tổng Giá</th>
                                            <th class="pro-subtotal">Cập Nhật</th>
                                            <th class="pro-remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach (Session::get('Cart')->products as $item)
                                        {{-- {{dd($item)}} --}}
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{asset($item['productInfo']->image)}}" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#">{{$item['productInfo']->name}}</a></td>
                                            <td class="pro-price"><span>{{number_format($item['productInfo']->sale)}}đ</span></td>
                                            <td class="pro-quantity">
                                            <div class="pro-qty"><input id="quanty-item-{{$item['productInfo']->id}}" type="text" value="{{$item['quanty']}}"></div>
                                            </td>
                                            <td class="pro-subtotal"><span>{{number_format($item['price'])}}đ</span></td>
                                            <td class="pro-remove"> <div class="cart-update">
                                                <a href="javascript:"  onclick="SaveListItemCart( {{$item['productInfo']->id}} )" class="btn btn-sqr" >Update</a>
                                            </div></td>
                                            <td class="pro-remove"><a href="javascrip:" ><i class="fa fa-trash-o" onclick="removeViewCart({{$item['productInfo']->id}})"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            {{-- <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                        <button class="btn btn-sqr">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="cart-update">
                                    <a href="javascript:"  onclick="SaveListItemCart( {{$item['productInfo']->id}} )" class="btn btn-sqr" >Update Cart</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Tổng số lượng</td>
                                                <td>{{ isset(Session::get('Cart')->totalQuanty) ? Session::get('Cart')->totalQuanty: '0'}}</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Tổng tiền</td>
                                                <td class="total-amount">{{isset(Session::get('Cart')->totalPrice) ? number_format(Session::get('Cart')->totalPrice): '0'}}đ</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            <a href="{{route('shop.cart.checkout')}}" class="btn btn-sqr d-block">Checkout</a>
                            </div>
                        </div>
                    </div>

                </div>
                @endif
                @else
                <div class="section-bg-color" id="list-cart">
                    <p>Giỏ hàng trống</p>
                    </div>
                @endif
            </div>
        </div>
        <!-- cart main wrapper end -->
@endsection

@section('js')
<script>
    function removeViewCart(id){
        // console.log(id);
        $.ajax({
                url:'/dat-hang/xoa-san-pham-trong-gio-hang/'+ id,
                type:'GET',
            }).done(function(response){
                RenderViewCart(response);
                alertify.success('Đã xóa sản phẩm ');
            });
    }
    function SaveListItemCart(id){
    //    console.log( $("#quanty-item-{{$"+id).val());
        $.ajax({
                url:'/dat-hang/cap-nhat-gio-hang/'+ id + '/ '+ $("#quanty-item-"+id).val(),
                type:'GET',
            }).done(function(response){
                RenderViewCart(response);
                alertify.success('Đã cập nhật sản phẩm ');
            });
    }
    function RenderViewCart(response){
        $("#list-cart").empty();
        $("#list-cart").html(response);
        // quantity change js
        $('.pro-qty').prepend('<span class="dec qtybtn">-</span>');
        $('.pro-qty').append('<span class="inc qtybtn">+</span>');
        $('.qtybtn').on('click', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
    }
    // function removeViewCart(id){
    // var a1= $.ajax({
    //             url:'/dat-hang/xoa-san-pham-trong-gio-hang/'+id,
    //             type:'GET',
    //         }).done(function(response){
    //             RenderViewCart(response);
    //             // alertify.success('Đã thêm sản phẩm vào giỏ');
    //         });
    //     var a2=$.ajax({
    //             url:'dat-hang/xoa-sp-gio-hang/'+$(this).data("id"),
    //             type:'GET',
    //         }).done(function(response){
    //             RenderCart(response);
    //             alertify.success('Đã xóa sản phẩm');
    //         });
    //     $.when(a1,a2).done(function(r1,r2))
    //     {}
    // }
</script>
@endsection