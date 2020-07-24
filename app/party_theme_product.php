<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class party_theme_product extends Model
{
    protected $table="party_theme_product";
    public $timestamps = false;

    use SoftDeletes;
}
