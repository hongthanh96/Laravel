<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{   use SoftDeletes;
    public $guarded = [];
    public function city(){
        return $this->belongsTo('App\City', 'city_id','id');
    }
}
