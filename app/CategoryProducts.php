<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProducts extends Model
{
    protected $table ="category_product";
  
    public function products(){
        return $this->belongstoMany('App\Products','categoryproduct_product','category_product_id','product_id');
    }
    //
}
