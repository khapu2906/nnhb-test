<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Bills;
use App\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VipCustomer_Controller extends Controller
{
    //
    public function index(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $date='';
        if(!empty($request->input("date"))){
            $bill_list = new Bills();
            $date = strtotime($request->input('date'));
            $bill_list = $bill_list->whereMonth('time',date('m',$date))->whereYear('time',date('Y',$date));
            $date = $request->input('date');
            $bill_list = $bill_list->get();
            $customer_list = Customers::get();
            $customer_list = VipCustomer($customer_list,$bill_list);
            $customer_list = sortCustomer($customer_list,1);
        }else{
            $customer_list = Customers::orderBy('orders','DESC')->get();
        }
        //dd($request->input('status'));
        return view('admin.analyst.vip-customer',['customer_list' => $customer_list,'date'=>$date ]);
    }
}
