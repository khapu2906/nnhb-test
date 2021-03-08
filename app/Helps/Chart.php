<?php

    function sumData($data_list,$type){
        $sum = 0;
        if($data_list != NULL){
            foreach($data_list as $data){
                if($data['type'] == $type){
                    $sum += $data['total']; 
                }
            }
        }    
        return $sum;
    }

    function typeData($data_list,$type){
        $type_data = [];
        foreach($data_list as $data){
            if($data['type'] == $type){
                array_push($type_data,$data);
            }
        }
        return $type_data;;
    }

    function chartValueData($data_list){
        $data_chart = [];
        foreach($data_list as $data){
            if(array_key_exists(date('d-m',strtotime($data->time)),$data_chart)){
                $data_chart[date('d-m',strtotime($data->time))] += $data->total;
            }else{
                $data_chart[date('d-m',strtotime($data->time))] = $data->total;
            }
        }
        return $data_chart;
    }

    function fullChartValue($data,$bill){
        foreach($bill as $key => $value){
            if(!array_key_exists($key,$data)){
                $data[$key] = 0;
            }

        }
        ksort($data);
        return $data;
    }

  