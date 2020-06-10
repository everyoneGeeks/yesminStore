<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Providers extends Model
{
    protected $table="providers";
    public $timestamps = false;


    public function beautyCenter(){
        return $this->hasOne('App\beautyCenter','providers_id');
    }
}
