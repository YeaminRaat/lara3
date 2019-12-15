<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_name', 'brand_desc', 'brand_image', 'brand_status',
    ];
}
