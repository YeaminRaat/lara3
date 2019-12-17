<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Customer;
use Mail;

class CustomerController extends Controller
{
    public function register(Request $request){
    	$request->validate([
    		'first_name' => 'required|string',
    		'email_address' => 'required|unique:customers',
    		'password' => 'required|min:5'
    	]);

    	$customer = new Customer();

    	$customer->first_name = $request->first_name;
    	$customer->last_name = $request->last_name;
    	$customer->email_address = $request->email_address;
    	$customer->phone_no = $request->phone_no;
    	$customer->password = bcrypt($request->password);
    	$customer->address = $request->address;
    	$customer->save();

    	$data = $customer->toArray();
        Mail::send('vendor.mail',$data,function ($message) use ($data){
            $message->to($data['email_address']);
            $message->subject('Welcome to Eiser Shop');
        });

    	return response()->json($data);
    }

    public function login(){

    }
}
