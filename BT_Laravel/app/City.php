<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function customers(){
        return $this->hasMany('App\Customer','city_id','id');
    }
}
