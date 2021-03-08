<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "product";
    //
   protected function category_products(){
       return $this->belongsToMany('App\CategoryProducts','categoryproduct_product','product_id','category_product_id');
   }
}
