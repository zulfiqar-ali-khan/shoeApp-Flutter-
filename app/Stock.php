<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable = [
        'brand_id','shoe_id','add_stock','sale_stock','store_id'
    ];

    public function brand(){
        return $this->hasMany('App\Brand','id','brand_id');
    }

    public function store(){
        return $this->hasMany('App\Store','id','store_id');
    }

    public function shoedetails(){
        return $this->hasMany('App\ShoeDetails','id','shoe_id');
    }

}

