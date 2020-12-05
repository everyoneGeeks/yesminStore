<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class beautyServices extends Model
{

    public $timestamps = false;
    public $table="beauty_services";


    public function beauty(){
        return $this->belongsTO('App\beautyCenter','beauty_centers_id');
    }
}
