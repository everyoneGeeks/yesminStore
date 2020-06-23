<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    protected $table="products";
    public $timestamps = false;

    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo('App\category','category_id');

    }
    

    public function subcategory()
    {
        return $this->belongsTo('App\subCategory','sub_category_id');

    }

    

    public function images()
    {
        return $this->hasMany('App\productImage','product_id');

    }
}
