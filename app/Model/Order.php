<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function shipping(){
        return $this->belongsTo(ShippingAddress::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
