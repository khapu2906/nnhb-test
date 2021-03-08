<?php
    function UpdateProductBill($detail_bill,$data_product,$status=NULL){
        $data_new = [];
        foreach($detail_bill as $bill){
            if(empty($data_product)){
                $data_new = $detail_bill;
            }else{
                foreach($data_product as $product){
                    unset($product['created_at']);
                    unset($product['updated_at']);
                    if($bill->id == $product->id){
                        if($status=='drop'){
                            $product->quantum = $product->quantum - $bill->quantum_buy;
                            array_push($data_new,json_decode(json_encode($product),TRUE));
                        }else{
                            $product->quantum = $product->quantum + $bill->quantum_buy;
                            array_push($data_new,json_decode(json_encode($product),TRUE));
                        }
                    }
                }
            }    

        }
        return $data_new;
    }

    function getIdProductInDetail($detail_bill){
        $data = [];
        do{
            $detail = current($detail_bill);
            array_push($data,$detail->id);
        }while(next($detail_bill));

        return $data;
    }
    