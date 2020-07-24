<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class occasion extends Model
{
    protected $table="occasion";
    public $timestamps = false;
    use SoftDeletes;
}
