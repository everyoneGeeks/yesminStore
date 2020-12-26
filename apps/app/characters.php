<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class characters extends Model
{
    protected $table="characters";
    public $timestamps = false;
    use SoftDeletes;

    public function products()
{
    return $this->belongsToMany('App\product','character_product','character_id','product_id')->withPivot('character_id');

}
}
