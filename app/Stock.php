<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable = [
        'brand_name','color','article','shoe_quantity','shoe_img'
    ];
}

