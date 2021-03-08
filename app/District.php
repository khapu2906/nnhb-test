<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = "quanhuyen";

    protected function wards(){
        return $this->hasMany('App\Ward','quanhuyen_id');
    }
}
