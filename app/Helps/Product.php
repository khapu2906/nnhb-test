<?php

    function addCategoryProductId($id,$category_product_id){
        $data = [];
        $item = [];
        $category_product_id = explode(",",$category_product_id);
        for($i = 0; $i <count($category_product_id) ; $i++){
            $item['product_id'] = $id;
            $item['category_product_id'] = $category_product_id[$i];
            array_push($data,$item);
        }
        return $data;
    }

    function CateogryIdtoString($category_product_id){
        $data_new = [];
        foreach($category_product_id as $category){
            array_push($data_new,$category->id);
        }
        return implode(",",$data_new);
    }

    function CategoryName($category_product_id){
        $data_new = [];
        $item = [];
        foreach($category_product_id as $category){
            $item['id'] = $category->id;
            $item['name'] = $category->name;
            array_push($data_new,$item);
        }
        return $data_new;
    }

    function HotPoint($detail_bill,$detail_old=null){
        $data_new=[];
        $item = [];
        if($detail_old == null){
            foreach($detail_bill as $detail){
                $item['point'] = 1;
                $item['product_id'] = $detail->id;
                array_push($data_new,$item);
            }
        }else{
            foreach($detail_bill as $key => $detail){
                foreach($detail_old as $deold){
                    if($detail->id == $deold->id){
                        unset($detail_bill[$key]);
                    }
                }
            }
            foreach($detail_bill as $detail){
                $item['point'] = 1;
                $item['product_id'] = $detail->id;
                array_push($data_new,$item);
            }
        }
        return $data_new;
    }

    function SumPoint($data){
        //$data = current($data);
        //$lang = 0;
        foreach($data as $da){
            $lang = $da['id'];
        }
        //dd($prev);
        //return $data;
    }