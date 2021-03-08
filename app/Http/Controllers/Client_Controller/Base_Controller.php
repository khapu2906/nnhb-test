<?php

namespace App\Http\Controllers\Client_Controller;

use App\Configs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
use App\User;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Base_Controller extends Controller
{
    protected $menu;
    protected $name;
    protected $phone;
    protected $mail;
    protected $place;
    protected $facebook;
    protected $instagram;
    protected $youtube;

    public function __construct(){
        $menu = Menu::orderBy('left')->get();
        $this->menu = showCategory(json_decode(json_encode(current($menu)),true));
        $info = Configs::first();
        $this->name = $info->name;
        $this->phone = $info->phone;
        $this->mail = $info->mail;
        $this->time = $info->time;
        $this->place = $info->place;
        $this->facebook = $info->facebook;
        $this->instagram= $info->instagram;
        $this->youtube = $info->youtube;
    }

    protected function validates($data){
        return Validator::make($data,[
            'email'  => 'email|required|max:255',
            'password'  => 'required|min:8'
        ]);
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $email    = $request->input('email');
            $password =   $request->input('password');
            $role     = 1;
            $status   = 1;
            $validator = $this->validates($request->all());
            if($validator->fails()){
                return redirect('dang-nhap')->withInput()->withErrors($validator);
            }
            if(Auth::attempt(['email'=>$email,'password' =>$password,'role'=>$role,'status'=>$status])){
                return redirect()->back();
            }else{
                return redirect('dang-nhap')->withInput()->withErrors('The datas are not matched');
            }
        }
    }

    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        $getInfo = Socialite::driver($provider)->user(); 
        $user = $this->createUser($getInfo,$provider); 
        auth()->login($user); 
        return redirect()->back();
    }

    public function createUser($getInfo,$provider){
        $role     = 1;
        $status   = 1;
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'accountname'     => $getInfo->accountname,  
                'email'    => $getInfo->email,
                'role'     => $role,
                'status'   => $status,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }
        return $user;
    }

    public function logout(){
        if(Auth::check()&&Auth::user()->role ==1){
            Auth::logout();
            return redirect()->back();
        }
        return back();
    }
}
