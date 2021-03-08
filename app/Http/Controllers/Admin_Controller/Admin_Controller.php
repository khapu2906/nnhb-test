<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Customers;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Admin_Controller extends Base_Controller
{
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        }    
        $admin_list = User::where('role','=',0)->paginate(15);
        return view('admin.admin.index',['admin_list'=>$admin_list]);
          
    }


    public function status(Request $request){
        if($request->ajax()){
            $admin = User::find($request->input('id'));
            $status = ($request->input('status')==1)? 0: 1;
           
            $admin->status = $status;
            $admin->save();
            return 'Success!!!';
        }
        return 'Error';
    }

    public function validator($request,$action){
        if($action =='add'){
            return Validator::make($request->all(),[
                'accountname' =>'required|unique:users,accountname|max:55|min:5',
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

    public function add(Request $request){
        if(Auth::user()->role!=0)
            return redirect('admin');
        if($request->isMethod('post')){
           $error  = $this->validator($request,'add');
            if($error->fails()){
                return redirect('admin/admin-add')->withErrors($error)->withInput();
            }
            else{
                $accountname = $request->input('accountname');
                $email       = $request->input('email');
                $password    = $request->input('password');

                $admin              = new User();
                $admin->accountname = $accountname;
                $admin->email       = $email;
                $admin->role        = 0;
                $admin->status      = 1;
                $admin->password    = Hash::make($password);
                $admin->save();
                return redirect('admin/admin-add')->withErrors('Success');
            }   
           // dd($request->input('detail'));
        }
        return view('admin.admin.add') ; 
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0)
            return redirect('admin');
        $admin            = User::find($id);
        if(!empty($admin)){
            if($request->isMethod('post')){
                $valiator = $this->validator($request,'edit');
                if($valiator->fails()){
                    return redirect("admin/admin-edit/$id")->withErrors($valiator)->withInput();
                }else{
                    $accountname        = $request->input('accountname');
                    $email              = $request->input('email');
                    $password           = $request->input('password');

                    $admin->accountname      = $accountname;
                    $admin->email            = $email;
                    $admin->password         = Hash::make($password);
                    $admin->save();
                    return redirect("admin/admin-edit/$id")->withError('Success');
                }    
            }  
            return  view('admin.admin.edit',['admin'=>$admin]);
        }    
        return redirect('admin/admin');
    }

}
