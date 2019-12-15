<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){
    	$cartproduct = Product::find($request->id);
    	Cart::add([
    		'id' => $request->id, 
    		'name' => $cartproduct->product_name, 
    		'qty' => $request->id, 
    		'price' => $cartproduct->discount_price, 
    		'weight' => 0, 
    		'options' => ['images' => $cartproduct->image]
    	]);

    }

    public function allCart(){
    	$cart = Cart::content();

    	return response()->json($cart);
    }
}
