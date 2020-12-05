<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class returnOrder extends Model
{
    protected $table="return_orders";
    public $timestamps = false;
<<<<<<< HEAD
    
    
    public function product(){
    return $this->belongsTo('App\product','product_id');
}


public function user(){
    return $this->belongsTo('App\Users','user_id');
}



public function order(){
    return $this->belongsTo('App\Orders','order_id');
}

=======
>>>>>>> a272f5777e314da3da09e5a8e23c90f6d65d4551
}
