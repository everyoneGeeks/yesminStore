<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use Notifiable;
    protected $table="users";
    public $timestamps = false;

    public function address()
    {
        return $this->hasMany('App\Address','user_id');
    }

    public function cart()
    {
        return $this->belongsTo('App\cart','user_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Orders','user_id');
    }


}
