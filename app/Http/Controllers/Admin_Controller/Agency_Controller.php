<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Bills;
use App\City;
use App\Agency;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Auth;

class Agency_Controller extends Base_Controller
{
    public function index($key=null,$type=null){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $agency_list = new Agency();
        if($key!=null && $type!=null){
            $agency_list = $agency_list->where("$type",'like',"%$key%");
        }
        $agency_list = $agency_list->paginate(10);
        return view('admin.agency.index',['agency_list'=>$agency_list]);
    }

    public function validator($request,$action){
        if($action =='add'){
            return Validator::make($request->all(),[
                'name' =>'required|max:55|min:5',
                'place'=>'required|min:10',
                'city'=>'required',
            ]);
        }
        return Validator::make($request->all(),[
            'name' =>'required|max:55|min:5',
            'place'=>'required|min:10',
            'city'=>'required',
        ]);
    }

    public function add(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $citys = City::get();
        if($request->isMethod('post')){
            $valiator = $this->validator($request,'add');
            if($valiator->fails()){
                return redirect('admin/agency-add')->withErrors($valiator)->withInput();
            }else{
                $name       = $request->input('name');
                $phone      = $request->input('phone');
                $email      = $request->input('email');
                $place = $request->input('place').'_'.$request->input('ward').'_'.$request->input('district').'_'.$request->input('city');
                $note       = $request->input('note');

                $agency            = new Agency();
                $agency->name      = $name;
                $agency->phone     = $phone;
                $agency->email     = $email;
                $agency->place     = $place;
                $agency->note      = $note;
                $agency->save();
                return redirect('admin/agency-add')->withError('Success');
            }    
        }  
        return  view('admin.agency.add',['citys'=>$citys]);
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $citys = City::get();
        $agency            = Agency::find($id);
        if(!empty($agency)){
            if($request->isMethod('post')){
                $valiator = $this->validator($request,'edit');
                if($valiator->fails()){
                    return redirect("admin/agency-edit/$id")->withErrors($valiator)->withInput();
                }else{
                    $name       = $request->input('name');
                    $phone      = $request->input('phone');
                    $email      = $request->input('email');
                    $place = $request->input('place').'_'.$request->input('ward').'_'.$request->input('district').'_'.$request->input('city');
                    $note       = $request->input('note');

                    $agency->name      = $name;
                    $agency->phone     = $phone;
                    $agency->email     = $email;
                    $agency->place     = $place;
                    $agency->note      = $note;
                    $agency->save();
                    return redirect("admin/agency-edit/$id")->withError('Success');
                }    
            }  
            $places = explode('_',$agency->place);
            $place = (isset($places['0']))?$places['0']:'';
            $ward = (isset($places['1']))?$places['1']:'';
            $district = (isset($places['2']))?$places['2']:'';
            $city = (isset($places['3']))?$places['3']:'';  
            return  view('admin.agency.edit',['agency'=>$agency,'place'=>$place,'ward'=>$ward,'district'=>$district,'city'=>$city,'citys'=>$citys]);
        }    
        return redirect('admin/agency');
    }

    public function delete($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if(isset($id)){
            $agency = Agency::find($id);
            if(!empty(  $agency))
                $agency>delete();
            return redirect('admin/agency');
        }
        return redirect('admin/agency');   
    }


    

}
