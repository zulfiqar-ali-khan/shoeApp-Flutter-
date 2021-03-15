<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    //

    protected $fillable = [
        'brand_name','quantity','name','number','location','total_price','date'
    ];

    public function brand(){
        return $this->hasMany('App\Brand','id','brand_id');
    }
}
