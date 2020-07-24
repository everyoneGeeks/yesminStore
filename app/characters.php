<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class characters extends Model
{
    protected $table="characters";
    public $timestamps = false;
    use SoftDeletes;
}
