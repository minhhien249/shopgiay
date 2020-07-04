<?php

namespace App\Http\Controllers;

use Session;
use App\Banner;
use App\Cart;
use App\Category; // cần thêm dòng này nếu chưa có
use App\Coupon;
use App\Order;
use App\OrderDetail;
use App\Product;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends ShopController
{

// Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return $this->notfound();
        }

        // Kiểm tra tồn tại giỏ hàng cũ
        $oldcart = Session('Cart') ? Session('Cart') : '';
        // Khởi tạo giỏ hàng
        $newCart = new Cart($oldcart);
        //goi den addCart
        $newCart->AddCart($product,$id);

        $request->Session()->put('Cart',$newCart);
        // dd(session('Cart'));

        return view('shop.components.cart');
    }

    // Xoa sản phẩm vào giỏ hàng
    public function removeToCart(Request $request, $id)
    {
        // Kiểm tra tồn tại giỏ hàng cũ
        $oldcart = Session('Cart') ? session('Cart') : '';
        // Khởi tạo giỏ hàng
        $newCart = new Cart($oldcart);
        //goi den addCart
        $newCart->DeleteItemCart($id);
        if (Count($newCart->products) > 0) {
            $request->Session()->put('Cart',$newCart);
        }else{
            $request->Session()->forget('Cart');
        }
        return view('shop.components.cart');

    }


    public function ViewListCart(Request $request)
    {
        return view('shop.cart');
    }
    public function removeViewCart(Request $request,$id)
    {
         // Kiểm tra tồn tại giỏ hàng cũ
         $oldcart = Session('Cart') ? session('Cart') : '';
         // Khởi tạo giỏ hàng
         $newCart = new Cart($oldcart);
         //goi den addCart
         $newCart->DeleteItemCart($id);
         if (Count($newCart->products) > 0) {
             $request->Session()->put('Cart',$newCart);
         }else{
             $request->Session()->forget('Cart');
         }

         return view('shop.components.view-list-cart');

    }

   // Cập nhật lại giỏ hàng
    public function SaveListItemCart(Request $request, $id, $quanty){


        // check nhập số lượng không đúng định dạng
        $validator = Validator::make($request->all(), [
            'quanty' => 'required|numeric|min:1',
        ]);

        // check số lượng lỗi
        if ($validator->fails()) {
            return response()->json([
                'status'  => false ,
                'data' => $validator
            ]);
        }
        $product_id = $request->input('id');

         // Kiểm tra tồn tại giỏ hàng cũ
        $oldcart = Session('Cart') ? session('Cart') : '';
        // Khởi tạo giỏ hàng
        $newCart = new Cart($oldcart);
        //goi den addCart
        $newCart->UpdateItemCart($id,$quanty);

        $request->Session()->put('Cart',$newCart);


        // return view('shop.components.view-list-cart');
        return response()->json([

            'data' => view('shop.components.view-list-cart')->render()
        ]);
    }

     // Check mã giảm giá
     public function checkCoupon(Request $request)
     {
         $coupon = Coupon::where('code', $request->coupon_code)->first();

         if (!$coupon) {
             return redirect()->back()->withErrors(['errorCoupon' => 'Mã giảm giá không tồn tại']);
         }


         $oldcart = Session('Cart');
         $discount = 0; // số tiền được giảm giá , default = 0

         // check default tính theo giá
         if ($coupon->value) {
             $discount = $coupon->value;
         } else {
             if ($coupon->percent) {
                 // tính theo %
                 $discount = ($coupon->percent * $oldcart->totalPrice) / 100;
             }
         }

         // Get lại giỏ hàng
         $newCart = new Cart($oldcart);
         $newCart->discount = $discount; // set số tiền được giảm
         $newCart->coupon = $coupon->code;

         // Lưu thông tin vào session
         $request->Session()->put('Cart', $newCart);

         return redirect()->back();
     }


    // Thanh toán
    public function checkout()
    {
        return view('shop.checkout');
    }

    // thêm đơn hàng
    public function postCheckout(Request $request)
    {
        if (!session('Cart')) {
            return redirect('/');
        }

        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // Kiểm tra tồn tại giỏ hàng cũ
        $oldcart = Session('Cart');

        // Lưu vào bảng đơn đặt hàng - orders
        $order = new Order();
        $order->fullname = $request->input('fullname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->note = $request->input('note');
        $order->total = $oldcart->totalPrice;
        $order->discount = $oldcart->discount;
        $order->coupon = $oldcart->coupon;
        $order->order_status_id = 1; // 1 = mới
        // Lưu vào bảng chỉ tiết đơn đặt hàng


        if ($order->save()) {
            // Tạo mã đơn hàng gửi tới khách hàng
            $order->code = 'DH-'.$order->id.'-'.date('d').date('m').date('Y');
            $order->save();

            foreach ($oldcart->products as $product) {
                $_detail = new OrderDetail();
                $_detail->order_id = $order->id;
                $_detail->name = $product['productInfo']->name;
                $_detail->image = $product['productInfo']->image;
                $_detail->sku = $product['productInfo']->sku;
                $_detail->user_id = $product['productInfo']->user_id;
                $_detail->product_id = $product['productInfo']->id;
                $_detail->quanty = $product['quanty'];
                $_detail->price = $product['price'];
                $_detail->save();
            }

            // Xóa thông tin giỏ hàng Hiện tại
            $request->Session()->forget('Cart');

            return redirect()->route('shop.cart.checkout')
                             ->with('msg', 'Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn : #'.$order->code);
        }
    }
}
