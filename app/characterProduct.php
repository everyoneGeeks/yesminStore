<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class characterProduct extends Model
{
    protected $table="character_product";
    public $timestamps = false;
    use SoftDeletes;
}
