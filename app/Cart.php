<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products; // danh sản phẩm
    public $totalPrice = 0; // Tổng tiền
    public $totalQuanty = 0; // tổng sô SP
    public $discount = 0; // giá giảm
    public $coupon; // Mã giảm giá

    public function __construct($cart)
    {
        parent::__construct();

        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
            $this->discount = $cart->discount;
            $this->coupon = $cart->coupon;
        }

    }

     // Thêm sản phẩm vào giỏ hàng
    public function AddCart($product,$id){
        $newProduct = [
            'quanty' => 0,
            'price' => $product->sale,
            'productInfo' => $product
        ];

        if ($this->products){
            if (array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->sale;
        $this->products[$id] = $newProduct;
        $this->totalPrice +=  $product->sale; // tong gia
        $this->totalQuanty++;

    }
    // xóa giỏ hàng
    public function DeleteItemCart($id){
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    // Cập nhật giỏ hàng
    public function UpdateItemCart($id , $quanty)
    {
        // Xóa số lượng + giá của thằng hiện tại để cập nhật lại
        $this->totalQuanty -= $this->products[$id]['quanty'];
        $this->totalPrice -= $this->products[$id]['price'];

        // Cập nhật số lượng && giá của sẩn phẩm
        $this->products[$id]['quanty'] = $quanty;
        $this->products[$id]['price'] = $quanty * $this->products[$id]['productInfo']->sale;

        // cập nhật lại giỏ hàng
        $this->totalQuanty +=  $this->products[$id]['quanty'];
        $this->totalPrice += $this->products[$id]['price'];
    }


}
