<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishList extends Model
{
    protected $table="wish_list";
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\product','product_id');
    }
}
