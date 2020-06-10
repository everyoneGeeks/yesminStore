<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beautyCenter extends Model
{
    protected $table="beauty_centers";
    public $timestamps = false;


    public function rate(){
        return $this->hasMany('App\review','beauty_center_id');
    }

    public function beautyCenterLevels(){
        return $this->belongsTo('App\beautyCenterLevels','beauty_center_level_id');
    }

    public function category(){
        return $this->belongsTo('App\category','categories_id');
    }


}
