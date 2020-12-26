<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rateProduct extends Model
{
    protected $table="rate_product";
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Users','user_id');
    }


    public function product()
    {
        return $this->belongsTo('App\product','product_id');
    }
}
