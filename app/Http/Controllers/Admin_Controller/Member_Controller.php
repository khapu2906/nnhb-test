<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Customers;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Member_Controller extends Base_Controller
{
    
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $member_list = User::where('role',1)->paginate(15);
        return view('admin.member.index',['member_list'=>$member_list]);
    }

    public function detail($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $customer_list = Customers::where('user_id',$id)->get();
        return view('admin.member.detail',['customer_list' => $customer_list]);
    }

    public function status(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if($request->ajax()){
            $member = User::find($request->input('id'));
            $status = ($request->input('status')==1)? 0: 1;
           
            $member->status = $status;
            $member->save();
            return 'Success!!!';
        }
        return 'Error';
    }

    public function validator($request,$action){
        if($action =='add'){
            return Validator::make($request->all(),[
                'accountname' =>'required|unique:users,account|max:55|min:5',
                'email'=>'email|unique:users,email|max:220|min:10',
                'password'=>'required|min:8',
            ]);
        }
        return Validator::make($request->all(),[
            'accountname' =>'required|max:55|min:5',
            'email'=>'email|max:110|min:10',
            'password'=>'required|min:8',
        ]);
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $member            = User::find($id);
        if(!empty($member)){
            if($request->isMethod('post')){
                $valiator = $this->validator($request,'edit');
                if($valiator->fails()){
                    return redirect("admin/member-edit/$id")->withErrors($valiator)->withInput();
                }else{
                    $accountname        = $request->input('accountname');
                    $email              = $request->input('email');
                    $password           = $request->input('password');

                    $member->accountname      = $accountname;
                    $member->email            = $email;
                    $member->password         = Hash::make($password);
                    $member->save();
                    return redirect("admin/member-edit/$id")->withError('Success');
                }    
            }  
            return  view('admin.member.edit',['member'=>$member]);
        }    
        return redirect('admin/member');
    }

}
