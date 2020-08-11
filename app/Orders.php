<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $timestamps = false;
    public $table="orders";


    public function user(){
        return $this->belongsTo('App\Users','user_id');
    }


    public function orderCancel(){
        return $this->hasMany('App\orderCancel','order_id');
    }


        public function orderProduct(){
        return $this->belongsTomany('App\product','order_products','order_id','product_id');
    }





    
    public function shipping()
    {
        return $this->belongsTo('App\shipping','shipping_id');

    }


}
