<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Bills;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Revenue_Controller extends Controller
{
    //
    public function index(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $month_current  = date("m");
        $year_current   = date('Y');
        $date_from ='';
        $date_to ='';
        $revenue_total  = Bills::where('status','<>',4);
        $bill_list  = Bills::where('status','<>',4);
        if(!empty($request->all())){
            $date_from = $request->input('date_from');
            $date_to   = $request->input('date_to');
            if($date_from != null){
                $bill_list = $bill_list->where('time','>=',date('Y-m-d H:i:s',strtotime($date_from)));
                $revenue_total = $revenue_total->where('time','>',date('Y-m-d H:i:s',strtotime($date_from)));
            }
            if($date_to != null){
                $bill_list = $bill_list->where('time','<=',date('Y-m-d H:i:s',strtotime($date_to)));
                $revenue_total = $revenue_total->where('time','<',date('Y-m-d H:i:s',strtotime($date_to)));
            }
            //dd($request->all());
        }else{
            $month_current  = date("m");
            $year_current   = date('Y');
            $revenue_total  = $revenue_total->whereMonth('time',$month_current)->whereYear('time',$year_current );
            $bill_list      = $bill_list->whereMonth('time',$month_current)->whereYear('time',$year_current );
        }        
        $revenue_total = $revenue_total->sum('total');
        $bill_list  = $bill_list->orderBy('time','ASC')->get();
        $revenue_total_divide = ($revenue_total ==0)? 1 :$revenue_total;
        $rate_total_offline  = (sumData($bill_list,0)/$revenue_total_divide)*100;
        $rate_total_SM       = (sumData($bill_list,1)/$revenue_total_divide)*100;
        $rate_total_web      = (sumData($bill_list,2)/$revenue_total_divide)*100;
        
        $chart_data = chartValueData($bill_list);
        $chart_label = json_encode(array_keys($chart_data));
        $chart_value =  json_encode(array_values($chart_data));
        $data_offline = fullChartValue(chartValueData(typeData($bill_list,0)),$chart_data);
        $data_SM =  fullChartValue(chartValueData(typeData($bill_list,1)),$chart_data);
        $data_web = fullChartValue(chartValueData(typeData($bill_list,2)),$chart_data);
        $data_offline = json_encode(array_values($data_offline));
        $data_SM = json_encode(array_values( $data_SM));
        $data_web = json_encode(array_values($data_web));

        return view('admin.analyst.revenue',[   'month_current'     =>$month_current,
                                                'year_current'      =>$year_current,
                                                'revenue_total'     =>$revenue_total,
                                                'rate_total_offline'=>$rate_total_offline,
                                                'rate_total_SM'    =>$rate_total_SM ,
                                                'rate_total_web'    =>$rate_total_web,
                                                'chart_label'       => $chart_label,
                                                'chart_value'       =>$chart_value,
                                                'data_offline'      =>$data_offline,
                                                'data_SM'           =>$data_SM,
                                                'data_web'          =>$data_web,
                                                'date_from'         =>$date_from,
                                                'date_to'           =>$date_to
                                                                                    ]);
    }
}
