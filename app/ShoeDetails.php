<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoeDetails extends Model
{
    //

    protected $fillable = [
        'brand_id','image','quantity','color','artical'
    ];

    public function brand(){
        return $this->hasMany('App\Brand','id','brand_id');
    }


    public function order(){
        return $this->belongsTo('App\Order','id','shoe_id');
    }
}
