<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table="city";
    public $timestamps = false;

    public function country(){
        return $this->belongsToMany('App\country','country_city','city_id','country_id');
    }
}
