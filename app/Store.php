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
}
