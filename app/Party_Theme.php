<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Party_Theme extends Model
{
    protected $table="Party_Theme";
    public $timestamps = false;

    use SoftDeletes;
}
