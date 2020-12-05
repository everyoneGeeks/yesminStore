<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class occasionProduct extends Model
{
    protected $table="occasion_product";
    public $timestamps = false;


    public function occasions()
    {
        return $this->belongsTo('App\occasion');
    }

}
