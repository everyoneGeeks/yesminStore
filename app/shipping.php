<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $table="shipping";
    public $timestamps = false;

    public function cities(){
        return $this->belongsTo('App\city','city_id');
    }
}
