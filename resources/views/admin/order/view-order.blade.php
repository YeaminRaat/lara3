@extends('admin.master')

@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="h2">Order Information</span>
                                <a href="{{route('order.invoice', $orderDetails->id)}}" class="btn btn-primary float-right">
                                    Make Invoice
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Order No.</th>
                                        <td>{{$orderDetails->id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Total</th>
                                        <td>৳ {{$orderDetails->order_total}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Status</th>
                                        <td>{{$orderDetails->order_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td>{{ date("d M Y - h:i:sa", strtotime($orderDetails->created_at)) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Cutomer Information</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Customer name</th>
                                        <td>{{$orderDetails->customer->first_name.' '.$orderDetails->customer->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone No.</th>
                                        <td>{{$orderDetails->customer->phone_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email address</th>
                                        <td>{{$orderDetails->customer->email_address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$orderDetails->customer->address}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Shipping Information</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Full name</th>
                                        <td>{{$orderDetails->shipping->full_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone No.</th>
                                        <td>{{$orderDetails->shipping->phone_no}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email address</th>
                                        <td>{{$orderDetails->shipping->email_address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$orderDetails->shipping->address}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Payment Information</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Payment Status</th>
                                        <td>{{$orderDetails->payment->payment_status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Type</th>
                                        <td>{{$orderDetails->payment->payment_info}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>Product Information</h2>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Product id</th>
                                        <th>Product name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                    @php($sl = 1)
                                    @foreach($productDetails as $productDetail)
                                    <tr>
                                        <td>{{$sl++}}</td>
                                        <td>{{$productDetail->product_id}}</td>
                                        <td>{{$productDetail->product_name}}</td>
                                        <td>Tk. {{$productDetail->product_price}}</td>
                                        <td>{{$productDetail->product_quantity}}</td>
                                        <td>৳ {{$productDetail->product_quantity*$productDetail->product_price}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection