<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    protected $fillable = [
        'brand_id','shoe_id','customer_id','quantity','total_amount','store_id'
    ];



    public function shoedetails(){
        return $this->hasMany('App\ShoeDetails','id','shoe_id');
    }


    public function customer(){
        return $this->hasMany('App\Customer','id','customer_id');
    }


    public function brand(){
        return $this->hasMany('App\Brand','id','brand_id');
    }

    public function store(){
        return $this->hasMany('App\Store','id','store_id');
    }
}
