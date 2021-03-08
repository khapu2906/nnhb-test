<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = "tinhthanhpho";

    protected function districts(){
        return $this->hasMany('App\District','tinhthanhpho_id');
    }
}
