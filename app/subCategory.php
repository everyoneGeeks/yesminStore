<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class subCategory extends Model
{
    protected $table="sub_categories";
    public $timestamps = false;

    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * reqlation with category
     */

     public function category()
     {
        return $this->belongsTo('App\category','category_id');
     }
}
