<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class News extends Model
{
    //
    function category_new(){
        return $this->belongsTo('App\CategoryNews','category_new_id');
    }
}
