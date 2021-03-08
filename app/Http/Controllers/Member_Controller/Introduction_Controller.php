<?php

namespace App\Http\Controllers\Member_Controller;

use App\Bills;
use App\City;
use App\Customers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Introduction_Controller extends Controller
{
    //
    public function index(){
        if(Auth::user()->role!=1){
            return redirect('dang-nhap');
        } 
        $customer_list = Auth::user()->customers;
        $order_list = new Bills;
        foreach($customer_list as $customer){
            $order_list = $order_list->orWhere( 'customer->id','=',"$customer->id");
        }    
        $order_list = $order_list->get();
        return view('member.index',['customer_list' =>$customer_list,'order_list'=>$order_list]);
    }

    public function validator($request){
        return Validator::make($request->all(),[
            'accountname' =>'required|max:110',
            'password' =>'required'
        ]);
    }

    public function edit(Request $request){
        if(Auth::user()->role!=1){
            return redirect('dang-nhap');
        } 
        if($request->isMethod('post')){
            $validator = $this->validator($request);
            if($validator->fails()){
                return redirect('member')->withInput()->withErrors($validator);
            }else{
                if(!Auth::attempt(['email'=>Auth::user()->email,'password' =>$request->input('password'),'role'=>1,'status'=>1])){
                    return redirect('member')->withInput()->withErrors('Mật khẩu hiện tại không đúng');
                }else{
                    $user = User::find(Auth::user()->id);
                    $user->accountname = $request->input('accountname');
                    $user->password =  ($request->input('new_password')!='')?bcrypt($request->input('new_password')):bcrypt($request->input('password'));
                    $user->save();
                    return redirect('member')->withInput()->withErrors('Success');
                }
            }
        }
    }

    public function validators($request,$action){
        if($action =='add'){
            return Validator::make($request->all(),[
                'name' =>'required|max:55|min:5',
                'phone'=>'required|unique:customer,phone|max:11|min:9',
                'email'=>'max:220',
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

    public function add_customer(Request $request){
        if(Auth::user()->role!=1){
            return redirect('dang-nhap');
        } 
        $citys = City::get();
        if($request->isMethod('post')){
            $valiator = $this->validators($request,'add');
            if($valiator->fails()){
                return redirect('member/them-thong-tin-gui-hang')->withErrors($valiator)->withInput();
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
                $customer->user_id   = Auth::user()->id;
                $customer->save();
                return redirect('member/them-thong-tin-gui-hang')->withError('Success');
            }    
        }  
        return  view('member.add',['citys'=>$citys]);
    }

    public function edit_customer($id,Request $request){
        if(Auth::user()->role!=1){
            return redirect('dang-nhap');
        } 
        $citys = City::get();
        $customer            = Customers::find($id);
        if(!empty($customer)){
            if($request->isMethod('post')){
                $valiator = $this->validators($request,'edit');
                if($valiator->fails()){
                    return redirect("member/doi-thong-tin-gui-hang/$id")->withErrors($valiator)->withInput();
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
                    return redirect("member/doi-thong-tin-gui-hang/$id")->withError('Success');
                }    
            }
            $places = explode('_',$customer->place);
            $place = (isset($places['0']))?$places['0']:'';
            $ward = (isset($places['1']))?$places['1']:'';
            $district = (isset($places['2']))?$places['2']:'';
            $city = (isset($places['3']))?$places['3']:'';  
            return  view('member.edit',['customer'=>$customer,'place'=>$place,'ward'=>$ward,'district'=>$district,'city'=>$city,'citys'=>$citys]);
        }    
        return redirect('member');
    }

    public function delete_customer($id,Request $request){
        if(Auth::user()->role!=1){
            return redirect('dang-nhap');
        } 
        $customer            = Customers::find($id);
        if(!empty($customer)){
            if($request->isMethod('get')){
                    $user_id       = null;
                    $customer->user_id = $user_id;
                    $customer->save();
                    return redirect('member')->withError('Success');
            }    
        }  
        return redirect('member');
    }
}

