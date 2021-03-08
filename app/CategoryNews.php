<?php

namespace  App;

use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $table ="category_new";
    
    public function news(){
        return $this->hasMany('App\News','category_new_id');
    }
}
