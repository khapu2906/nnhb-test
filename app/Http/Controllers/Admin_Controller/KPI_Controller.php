<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\KPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class KPI_Controller extends Base_Controller
{
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $kpi_list = KPI::paginate(10);
        return view('admin.kpi.index',['kpi_list'=>$kpi_list]);
    }

    public function detail($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $kpi = KPI::find($id);
        return view('admin.kpi.detail',['kpi'=>$kpi]);
    }

    public function validator($request,$action){
        if($action == 'add'){
            return  Validator::make($request->all(),[
                'aim'  => 'required|max:11',
            ]);
        }else{
            return  Validator::make($request->all(),[
                'aim'  => 'required|max:11',
            ]);
        }
    
    }

    public function add(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if($request->isMethod('post')){
            $error  = $this->validator($request,'add');
            if($error->fails()){
                return redirect('admin/kpi-add')->withErrors($error)->withInput();
            }
            else{
                $aim       = $request->input('aim');

                $kpi            = new KPI();
                $kpi->aim     = $aim;
                $kpi->save();
                return redirect('admin/kpi-add')->withErrors('Success');
            }   
        }
        return view('admin.kpi.add') ; 
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $kpi = KPI::find($id);
        if(!empty($kpi)){
            if($request->isMethod('post')){
                $error  = $this->validator($request,'update');
                if($error->fails()){
                    return redirect("admin/kpi-edit/$id")->withErrors($error)->withInput();
                }else{
                    $aim       = $request->input('aim');

                    $kpi->aim     = $aim;
                    $kpi->save();
                    return redirect("admin/kpi-edit/$id")->withErrors('Success');
                }    
            } 
            return view('admin.kpi.edit',['kpi'=>$kpi]) ; 
        }
        return redirect('admin/kpi');
    }
    
    public function delete($id){
        if(isset($id)){
            $kpi = KPI::find($id);
            if(!empty($kpi))
                $kpi->delete();
            return redirect('admin/kpi');
        }
        return redirect('admin/kpi');        
    }
}
