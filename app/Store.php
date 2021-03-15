<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //

    protected $fillable = ['store_name'];


    public function shoedetails(){
        return $this->belongsTo('App\ShoeDetails','id','brand_id');
    }

    public function stock(){
        return $this->belongsTo('App\Stock','id','store_id');
    }

    public function order(){
        return $this->belongsTo('App\Order','id','store_id');
    }

    
}
