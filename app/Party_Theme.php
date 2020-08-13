<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Party_Theme extends Model
{
    protected $table="Party_Theme";
    public $timestamps = false;

    use SoftDeletes;


    public function products()
    {
        return $this->belongsToMany('App\product','party_theme_product','party_theme_id','product_id')->withPivot('party_theme_id');
    
    }
}
