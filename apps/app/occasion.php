<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class occasion extends Model
{
    protected $table="occasion";
    public $timestamps = false;
    use SoftDeletes;

    public function product()
{
    return $this->belongsToMany('App\product');
}


public function products()
{
    return $this->belongsToMany('App\product','occasion_product','occasion_id','product_id')->withPivot('occasion_id');

}

}
