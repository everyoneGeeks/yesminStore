<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    protected $table="products";
    public $timestamps = false;

    use SoftDeletes;

    protected $fillable = [
        'character_id',

    ];

    public function category()
    {
        return $this->belongsTo('App\category','category_id');

    }
    

    public function subcategory()
    {
        return $this->belongsTo('App\subCategory','sub_category_id');

    }


    public function occasion()
    {
        return $this->belongsToMany('App\occasion','occasion_product','product_id','occasion_id')->withPivot('occasion_id');

    }


    public function character()
    {
        return $this->belongsToMany('App\characters','character_product','product_id','character_id');

    }


    public function party_theme()
    {
        return $this->belongsToMany('App\Party_Theme','party_theme_product','product_id','party_theme_id');

    }

    public function rateProduct()
    {
        return $this->hasMany('App\rateProduct','product_id');

    }
    
    public function size()
    {
        return $this->belongsToMany('App\size','size_product','product_id','size_id');

    }

    
    
    
    public function images()
    {
        return $this->hasMany('App\productImage','product_id');

    }


    public function wishList()
    {
        return $this->hasMany('App\wishList','product_id');

    }



    

    // public function rate()
    // {
    //     return $this->hasMany('App\RateProducts','product_id');

    // }
}
