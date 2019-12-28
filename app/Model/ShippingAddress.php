<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    public function orders(){
    	return $this->hasMany(Order::class);
    }
}
