<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $timestamps = false;
    public $table="orders";


    public function user(){
        return $this->belongsTo('App\Users','users_id');
    }


    public function provider(){
        return $this->belongsTo('App\Providers','providers_id');
    }


        public function services(){
        return $this->belongsTomany('App\beautyServices','orders_services','orders_id','beauty_services_id');
    }



}
