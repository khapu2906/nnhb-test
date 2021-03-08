<?php

    function VipCustomer($cuslist,$billlist){
        foreach($cuslist as $cus){
            $cus['order'] = 0;
            foreach($billlist as $bill){
                $detail =current(json_decode($bill->customer));
                if($detail->id == $cus->id ){
                    $cus['order'] += 1;
                }
            }
        }
        return $cuslist;
    }

    function sortCustomer($data,$status=null){
        for ($i = 0; $i < count($data); $i++){
            for ($j = 1; $j < count($data) - $i; $j++){
                if($status==1){
                    if ($data[$j-1]->order < $data[$j]->order){
                        $tmp = $data[$j-1];
                        $data[$j-1] = $data[$j];
                        $data[$j] = $tmp;
                    }
                }else{
                    if ($data[$j-1]->orders > $data[$j]->orders){
                        $tmp = $data[$j-1];
                        $data[$j-1] = $data[$j];
                        $data[$j] = $tmp;
                    }
                }    
            }
        }
        return $data;
    }

   