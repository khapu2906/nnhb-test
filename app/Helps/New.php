<?php

function newFull($new,$category){
    foreach($new as $ne){
        foreach($category as $cate){
            if($cate->id == $ne->category_new_id){
                $ne['category_name'] = $cate->name;
            }
        }
    }
    return $new;
}