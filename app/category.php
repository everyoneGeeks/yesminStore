<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table="categories";
    public $timestamps = false;

    public function subcategory()
    {
        return $this->hasMany('App\subCategory','category_id');
    }
}
