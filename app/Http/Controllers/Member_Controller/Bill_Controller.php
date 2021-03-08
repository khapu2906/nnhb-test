<?php

namespace App\Http\Controllers\Member_Controller;

use App\Bills;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Bill_Controller extends Controller
{
    public function index($where=null){
        if(Auth::user()->role!=1){
            return redirect('dang-nhap');
        } 
        $code = '';
        $status = '';
        $type = '';
        $date = '';
        $customer_list = Auth::user()->customers;
        $bill_list = new Bills;
        foreach($customer_list as $customer){
            $bill_list =  $bill_list->orWhere('customer->id','=',"$customer->id");
        }
        if($where!=null){
            $where = json_decode($where,true);
            if($where['code']!=""){
                $code   = $where['code'];
                $bill_list = $bill_list->where('code','like',"%$code%");
            }else{
                unset($where['code']);
                foreach($where as $key => $value){
                        if($key == 'status'){
                            $status = $value;
                        }else if($key =='type'){
                            $type = $value;
                        }else{
                            $date = $value;
                        }
                    if($value!=""){    
                        $bill_list = $bill_list->where($key,'like',"%$value%");
                    }    
                }
            }
        }   
      
        $revenue_total = $bill_list->sum('total_sale');
        $bill_list = $bill_list->paginate(10);
        return view('member.index-bill',[    'bill_list'=>$bill_list,
                                            'code'   => $code,
                                            'status'   => $status,
                                            'type'   => $type,
                                            'date'   => $date,
                                            'revenue_total' => $revenue_total
                                                                    ]);
    }

    public function detail($id){
        if(Auth::user()->role!=1){
            return redirect('dang-nhap');
        } 
        $bill = Bills::find($id);
        $customer = json_decode($bill['customer']);
        $customer = (!empty($customer))? $customer:[];
        $bill_detail = json_decode($bill['detail'],true);
        if(!empty($bill_detail)){
            return view('member.detail',['bill_detail' => $bill_detail,'customer'=>$customer]);
        }
        return null;    
    }
}
