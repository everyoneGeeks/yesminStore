<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalanceRecharge extends Model
{
    protected $table="balance_recharge";
    public $timestamps = false;


    public function user(){
        return $this->belongsTo('App\Users','users_id');
    }


    public function provider(){
        return $this->belongsTo('App\Providers','providers_id');
    }
}
