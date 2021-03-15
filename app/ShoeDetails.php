<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoeDetails extends Model
{
    //

    protected $fillable = [
        'brand_id','color','artical'
    ];

    public function brand(){
        return $this->hasMany('App\Brand','id','brand_id');
    }

    public function store(){
        return $this->hasMany('App\Store','id','store_id');
    }


    public function order(){
        return $this->belongsTo('App\Order','id','shoe_id');
    }

    public function stock(){
        return $this->belongsTo('App\Stock','id','shoe_id');
    }
}
