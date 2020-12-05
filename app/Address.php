<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    protected $table="addresses";
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo('App\country','country_id');
    }


    public function city()
    {
        return $this->belongsTo('App\city','city_id');
    }
}
