<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Bills;
use App\City;
use App\Customers;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;
use Illuminate\Support\Facades\Auth;

class Customer_Controller extends Base_Controller
{
    public function index($key=null,$type=null){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $customer_list = new Customers();
        if($key!=null && $type!=null){
            $customer_list = $customer_list->where("$type",'like',"%$key%");
        }
        $customer_list = $customer_list->select('customer.*','users.id as userId','users.accountname as username')->leftJoin('users','users.id','=','user_id')->paginate(10);
        return view('admin.customer.index',['customer_list'=>$customer_list]);
    }

    public function validator($request,$action){
        if($action =='add'){
            return Validator::make($request->all(),[
                'name' =>'required|max:55|min:5',
                'phone'=>'required|unique:customer,phone|max:11|min:9',
                'place'=>'required|min:10',
                'city'=>'required',
                'district'=>'required',
                'ward'=>'required',
            ]);
        }
        return Validator::make($request->all(),[
            'name' =>'required|max:55|min:5',
            'phone'=>'required|max:11|min:9',
            'place'=>'required|min:10',
            'city'=>'required',
            'district'=>'required',
            'ward'=>'required',
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
                return redirect('admin/customer-add')->withErrors($valiator)->withInput();
            }else{
                $name       = $request->input('name');
                $birthday   = $request->input('birthday');
                $phone      = $request->input('phone');
                $email      = $request->input('email');
                $place = $request->input('place').'_'.$request->input('ward').'_'.$request->input('district').'_'.$request->input('city');
                $note       = $request->input('note');

                $customer            = new Customers();
                $customer->name      = $name;
                $customer->birthday  = $birthday;
                $customer->phone     = $phone;
                $customer->email     = $email;
                $customer->place     = $place;
                $customer->note      = $note;
                $customer->save();
                return redirect('admin/customer-add')->withError('Success');
            }    
        }  
        return  view('admin.customer.add',['citys'=>$citys]);
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $citys = City::get();
        $customer            = Customers::find($id);
        if(!empty($customer)){
            if($request->isMethod('post')){
                $valiator = $this->validator($request,'edit');
                if($valiator->fails()){
                    return redirect("admin/customer-edit/$id")->withErrors($valiator)->withInput();
                }else{
                    $name       = $request->input('name');
                    $birthday   = $request->input('birthday');
                    $phone      = $request->input('phone');
                    $email      = $request->input('email');
                    $place = $request->input('place').'_'.$request->input('ward').'_'.$request->input('district').'_'.$request->input('city');
                    $note       = $request->input('note');

                    $customer->name      = $name;
                    $customer->birthday  = $birthday;
                    $customer->phone     = $phone;
                    $customer->email     = $email;
                    $customer->place     = $place;
                    $customer->note      = $note;
                    $customer->save();
                    return redirect("admin/customer-edit/$id")->withError('Success');
                }    
            }  
            $places = explode('_',$customer->place);
            $place = (isset($places['0']))?$places['0']:'';
            $ward = (isset($places['1']))?$places['1']:'';
            $district = (isset($places['2']))?$places['2']:'';
            $city = (isset($places['3']))?$places['3']:'';  
            return  view('admin.customer.edit',['customer'=>$customer,'place'=>$place,'ward'=>$ward,'district'=>$district,'city'=>$city,'citys'=>$citys]);
        }    
        return redirect('admin/customer');
    }

    public function delete($id){
        
    }

    public function search($key,$type){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $customer_list = Customers::where($type,'like',"%$key%")->get();
        return view('admin.bill.customer.search',['customer_list'=> $customer_list]);
    }

    public function form(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $citys = City::get();
        return view('admin.bill.customer.form',['citys'=>$citys]);
    }

    public function add_ajax(Request $request){
        if($request->ajax()){
            $valiator = $this->validator($request,'add');
            if($valiator->fails()){
                return -1 ;
            }else{
                $name       = $request->input('name');
                $birthday   = $request->input('birthday');
                $phone      = $request->input('phone');
                $email      = $request->input('email');
                $place      = $request->input('place');
                $note       = $request->input('note');

                $customer            = new Customers();
                $customer->name      = $name;
                $customer->birthday  = $birthday;
                $customer->phone     = $phone;
                $customer->email     = $email;
                $customer->place     = $place;
                $customer->note      = $note;
                $customer->save();
                $customer_new  =  Customers::where('phone',$phone)->first();
                return $customer_new->id;
            }    

        }
    }

}
