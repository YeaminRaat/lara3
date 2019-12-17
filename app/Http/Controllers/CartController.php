<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){
    	$cartproduct = Product::find($request->id);

        if ($request->qty) {
            $qty = $request->qty;
        }else{
            $qty = 1;
        }

        if ($cartproduct->discount_price) {
            $price = $cartproduct->discount_price;
        }else{
            $price = $cartproduct->product_price;
        }
        
       
        Cart::add([
            'id' => $request->id, 
            'name' => $cartproduct->product_name, 
            'qty' => $qty, 
            'price' => $price, 
            'weight' => 0, 
            'options' => ['images' => $cartproduct->image]
        ]);;

        return "Cart added";
    }

    public function deleteCart(Request $request){
        Cart::remove($request->rowId);

        return "Cart Deleted";
    }

    public function updateCart(Request $request){

        Cart::update($request->rowId, $request->qty);

        return "Cart Deleted";
    }

    public function allCart(){
    	$cart = Cart::content();
        $count_cart = Cart::count();

        $subtotal=0;
        foreach ($cart as $value) {
            $subtotal+= $value->subtotal;
        }

    	return response()->json([
            'cart' => $cart,
            'count_cart' => $count_cart,
            'subtotal' => $subtotal
        ]);
    }

    /*public function countCart(){
        $count_cart = Cart::count();

        return response()->json($count_cart);
    }*/
}
