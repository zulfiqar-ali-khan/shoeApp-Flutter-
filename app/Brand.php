<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $fillable = [
        'brand_name'
    ];

    public function shoedetails(){
        return $this->belongsTo('App\ShoeDetails','id','brand_id');
    }

    public function stock(){
        return $this->belongsTo('App\Stock','id','brand_id');
    }

    public function order(){
        return $this->belongsTo('App\Order','id','brand_id');
    }

    public function customorder(){
        return $this->belongsTo('App\Order','id','brand_id');
    }

    
}
