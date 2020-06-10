<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complains extends Model
{
    protected $table="contacts";
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Users','users_id');
    }


    public function provider(){
        return $this->belongsTo('App\Providers','providers_id');
    }    
}
