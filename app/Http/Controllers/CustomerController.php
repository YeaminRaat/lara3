<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Model\Customer;
use App\Model\Shipping_address;
use Mail;

class CustomerController extends Controller
{
    public function register(Request $request){
    	
    	$this->validate($request,[
    		'first_name' => 'required|string',
    		'email_address' => 'required|unique:customers',
    		'password' => 'required|min:5'
    	]);

    	/*$validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
    		'email_address' => 'required|unique:customers',
    		'password' => 'required|min:5'
        ]);
        if ($validator->fails()) {
            return response()->json([
            	'errors'=>$validator->errors()
            ]);
        }*/

    	$customer = new Customer();

    	$customer->first_name = $request->first_name;
    	$customer->last_name = $request->last_name;
    	$customer->email_address = $request->email_address;
    	$customer->phone_no = $request->phone_no;
    	$customer->password = bcrypt($request->password);
    	$customer->address = $request->address;
    	$customer->save();
        Session::put('customerId',$customer->id);

    	/*$data = $customer->toArray();
        Mail::send('vendor.mail',$data,function ($message) use ($data){
            $message->to($data['email_address']);
            $message->subject('Welcome to Eiser Shop');
        });*/

    	return response()->json('Done');
    }

    public function login(Request $request){
    	$customer = Customer::where('email_address',$request->email_address)->first();
    	if ($customer) {
    		if (Hash::check($request->password, $customer->password)) {
    			Session::put('customerId',$customer->id);
    			//Session::put('customerName',$customer->first_name.' '.$customer->last_name);

    			return response()->json($customer);
    		};
    	}

    	return response()->json("Error");

    	/*if (password_verify($request->password, $customer->password)) {
    		return response()->json($data);
    	}else{
    		return response()->json("Error");
    	}*/
    }

    public function logout(){
        Session::forget('customerId');
        return response()->json("Logout done");
    }

    public function sessionData(){
        $id = Session::get('customerId');
        $customer = Customer::find($id);

        return response()->json([
            's_customer' => $customer
        ]);
    }
}
