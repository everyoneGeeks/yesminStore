<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class occasionProduct extends Model
{
    protected $table="occasion_product";
    public $timestamps = false;
    use SoftDeletes;


    public function occasions()
    {
        return $this->belongsTo('App\occasion');
    }

}
