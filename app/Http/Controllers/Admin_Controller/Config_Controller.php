<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Configs;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Config_Controller extends Base_Controller
{
    //
    public function validator($request){
        return Validator::make($request->all(),[
            'name'  => 'max:110',
            'phone' => 'max:55|min:9',
        ]);
    }
    
    public function index(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $config = Configs::first();
        if(empty($config)){
            $config = new Configs();
            $this->add_or_edit($request,$config);
            return view('admin.config.add');
        }         
        $this->add_or_edit($request,$config);
        return view('admin.config.index',['config' => $config]);
    }
    
    public function add_or_edit($request,$config){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if($request->isMethod('post')){
            $validator = $this->validator($request);
            if($validator->fails()){
                return redirect('admin/config')->withInput()->withErrors($validator);
            }else{
                $name       = $request->input('name');
                $phone      = $request->input('phone');
                $mail       = $request->input('mail');
                $time       = $request->input('time');
                $place      = $request->input('place');
                $facebook   = $request->input('facebook');
                $instagram  = $request->input('instagram');
                $youtube    = $request->input('youtube');
                
                $config->name   = $name;
                $config->phone  = $phone;
                $config->mail   = $mail;
                $config->time   = $time;
                $config->place = $place;
                $config->facebook = $facebook;
                $config->instagram = $instagram;
                $config->youtube  = $youtube ;
                $config->save();
                return redirect('admin/config')->withErrors('Success');
            }
        }    
    }
}
