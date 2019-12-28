<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ShippingAddress;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Payment;
use Session;
use Cart;

class OrderController extends Controller
{
    public function shippingInfo(Request $request){
    	/*$shipping = ShippingAddress::where('customer_id', Session::get('customerId'))->get();
    	if ($shipping) {
    		$shipping->full_name = $request->full_name;
        	$shipping->email_address = $request->email;
        	$shipping->phone_no = $request->number;
        	$shipping->address = $request->address;
        	$shipping->save();
    	}*/
        $shippingInfo = new ShippingAddress();
        $shippingInfo->customer_id = Session::get('customerId');
        $shippingInfo->full_name = $request->full_name;
        $shippingInfo->email_address = $request->email;
        $shippingInfo->phone_no = $request->number;
        $shippingInfo->address = $request->address;

        $shippingInfo->save();

        Session::put('shippingId',$shippingInfo->id);
        /*Session::put('full_name',$request->full_name);
        Session::put('email_address', $request->email);
        Session::put('phone_no', $request->number);
        Session::put('address', $request->address);*/

        return response()->json("Shipping Info Putting in session");

    }

    public function confirmOrder(Request $request){
        if ($request->type == 'cash') {
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Cart::subtotal();
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_info = $request->type;
            $payment->save();

            $cartProducts = Cart::content();
            foreach($cartProducts as $cartProduct){
                $orderDetails = new OrderDetail();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $cartProduct->id;
                $orderDetails->product_name = $cartProduct->name;
                $orderDetails->product_price = $cartProduct->price;
                $orderDetails->product_quantity = $cartProduct->qty;
                $orderDetails->save();
            }
            Cart::destroy();

            return response()->json('Order Confirmed');
        }
    }
}
