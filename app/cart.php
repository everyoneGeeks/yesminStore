<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table="cart";
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('App\product','product_id');
    }


    public function character()
    {
        return $this->belongsTo('App\characters','character_id');
    }


    public function occasion()
    {
        return $this->belongsTo('App\occasion','occasion_id');
    }

    public function party_theme()
    {
        return $this->belongsTo('App\Party_Theme','party_theme_id');
    }

    public function size()
    {
        return $this->belongsTo('App\size','size_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address','address_id');
    }
}
