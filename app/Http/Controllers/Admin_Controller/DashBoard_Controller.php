<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Bills;
use App\Customers;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\KPI;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoard_Controller extends Base_Controller
{
    //
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $month_current  = date("m");
        $year_current   = date('Y');
        $revenue_total  = Bills::where('status',3)->whereMonth('time',$month_current)->whereYear('time',$year_current )->sum('total');
        $revenue_total_divide = ($revenue_total ==0)? 1 :$revenue_total;
        $amount_of_bill = Bills::whereMonth('time',$month_current)->whereYear('time',$year_current )->count();
        $amount_of_use  = User::whereMonth('time',$month_current)->whereYear('time',$year_current )->where('role',1)->count(); 
        $kpi            = KPI::whereMonth('time',$month_current)->whereYear('time',$year_current )->sum('aim');
        $customer_list  = Customers::whereMonth('birthday',$month_current)->simplePaginate(10);
        $bill_list  = Bills::where('status',3)->whereMonth('time',$month_current)->whereYear('time',$year_current )->orderBy('time')->get();
        $rate_total_offline  = (sumData($bill_list,0)/$revenue_total_divide)*100;
        $rate_total_SM       = (sumData($bill_list,1)/$revenue_total_divide)*100;
        $rate_total_web      = (sumData($bill_list,2)/$revenue_total_divide)*100;
        
        $chart_data = chartValueData($bill_list);
        $chart_label = json_encode(array_keys($chart_data),true);
        $chart_value =  json_encode(array_values($chart_data));


        return view('admin.dashboard.index',[   'month_current'     =>$month_current,
                                                'year_current'      =>$year_current,
                                                'revenue_total'     =>$revenue_total,
                                                'amount_of_bill'    =>$amount_of_bill,
                                                'amount_of_use'     =>$amount_of_use,
                                                'kpi'               =>$kpi,       
                                                'customer_list'     =>$customer_list,
                                                'rate_total_offline'=>$rate_total_offline,
                                                'rate_total_SM'    =>$rate_total_SM ,
                                                'rate_total_web'    =>$rate_total_web,
                                                'chart_label'       => $chart_label,
                                                'chart_value'       =>$chart_value

                                                                            ]);
    }

    
}
