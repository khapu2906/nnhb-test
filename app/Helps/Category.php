<?php

function loopCategory($category=[]){
    $i = 0;
    $count = count($category) - 1;
    while($i < $count){
        $j = $i +1;
        echo $category[$i]['name'].'<br>';
        if($category[$i]['right'] > $category[$j]['right']){
            if(!isset($category[$i]['child'])){
                    $category[$i]['child'] = [];
            }
            array_push($category[$i]['child'],$category[$j]);
            $category[$i]['child'] = loopCategory($category[$i]['child']);
            unset($category[$j]);
            $i += 1;
        }
        $i += 1;
    }
    return $category;
}

function showCategory($direction){
    $count = count($direction);
    if($count >1){
        while($current = next($direction) ){
            $prev        = prev($direction);
            $key_prev    = array_search($prev,$direction);
            $key_current = array_search($current,$direction);
            if( $current['right'] <  $prev['right'] ){
                    if(!isset($prev['child'])){
                        $prev['child'] = [];
                    }
                    array_push($prev['child'],$current);
                    $prev['child'] = showCategory($prev['child']);
                    unset($direction[$key_current]);
            }else{
                next($direction);
            }    
            $direction[$key_prev] = $prev;
        }    
    }    
    return $direction;
}

function showCategoryadmin($category=[]){
    for($i = 0; $i  < count($category); $i++){
        $string_front = [];
        for($j = 1; $j <= $category[$i]->level; $j++){
               $string_front[$j] = '_';
        }
       
        $category[$i]->name = implode('|_',$string_front). $category[$i]->name;
    }
    return $category;
}