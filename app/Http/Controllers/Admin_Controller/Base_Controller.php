<?php

namespace App\Http\Controllers\Admin_Controller;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class Base_Controller extends Controller
{

    protected $name_user;

    protected function validates($data){
        return Validator::make($data,[
            'accountname'  => 'required|max:255',
            'password'  => 'required|min:8'
        ]);
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $accountname    = $request->input('accountname');
            $password =   $request->input('password');
            $role     = 0;
            $status   = 1;
            $validator = $this->validates($request->all());
            if($validator->fails()){
                return redirect('admin')->withInput()->withErrors($validator);
            }
            if(Auth::attempt(['accountname'=>$accountname,'password' =>$password,'role'=>$role,'status'=>$status])){
                return redirect('admin/dashboard');
            }else{
                return redirect('admin')->withInput()->withErrors('The datas are not matched');
            }
            return back()->withInput();
        }
        return view('admin.login');
    }

    public function logout(){
        if(Auth::check() && Auth::user()->role == 0){
            Auth::logout();
            return redirect('admin');
        }
        return back();
    }
}
