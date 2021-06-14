<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderInv extends Model
{
    //
    protected $fillable = [
        'customer_id','date','total_amount','inv'
    ];

    public function customer(){
        return $this->hasMany('App\Customer','id','customer_id');
    }
}
