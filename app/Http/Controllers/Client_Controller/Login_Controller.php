<?php

namespace App\Http\Controllers\Client_Controller;

use App\Customers;
use App\Http\Controllers\Client_Controller\Base_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Login_Controller extends Base_Controller
{
    public function index(){
        return view('client.login',['menu'          =>$this->menu,
                                    'name'          => $this->name,
                                    'mail'          => $this->mail,
                                    'phone'         => $this->phone,
                                    'place'         => $this->place,
                                    'time'          => $this->time,
                                    'youtube'       => $this->youtube,
                                    'instagram'     => $this->instagram,
                                    'facebook'      => $this->facebook,]);
    }

    public function validator($request){
        return Validator::make($request,[
            'email' => 'email|required|unique:users,email',
            'password'=>'required|min:8',
            'name'      =>'required|min:4|max:110',
            'phone'     =>'required|min:9|max:11|unique:customer,phone'
        ]);
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $validator = $this->validator($request->all());
            if($validator->fails()){
                return redirect('dang-nhap')->withInput()->withErrors($validator);
            }else{
                $name = $request->input('name');
                $password = $request->input('password');
                $email = $request->input('email');
                $phone = $request->input('phone');

                $user_id = DB::table('users')->insertGetId(
                    ['accountname' => $name,
                     'email' => $email,
                     'password' =>bcrypt($password),
                     'role'     =>1,
                     'status'   =>1
                    ]
                );

               $customer = new Customers;
               $customer->name = $name;
               $customer->phone = $phone;
               $customer->email = $email;
               $customer->user_id = $user_id;
               $customer->save();
               return redirect('dang-nhap')->withInput()->withErrors('Đăng ký thành công');
            }
            
        }
    }
}
