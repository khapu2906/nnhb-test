<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Banner;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Banner_Controller extends Base_Controller
{
    //
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $banner_list = Banner::paginate(10);
        return view('admin.banner.index',['banner_list'=>$banner_list]);
    }

    public function display(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if($request->ajax()){
            $video = Banner::find($request->input('id'));
            $display = ($request->input('display')== 1)? 0:1;

            $video->display = $display;
            $video->save();
            return 'Success!!!';
        }
    }

    public function validator($request,$action){
        if($action == 'add'){
            return  Validator::make($request->all(),[
                'name'  => 'required|unique:banner,name|max:110',
                'slug'  => 'required|unique:banner,slug',
                'image' => 'required'
            ]);
        }else{
            return  Validator::make($request->all(),[
                'name'  => 'required|max:110',
                'slug'  => 'required',
                'image' => 'required'
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
                return redirect('admin/banner-add')->withErrors($error)->withInput();
            }
            else{
                $name   = $request->input('name');
                $slug   = $request->input('slug');
                $image  = $request->input('image');
                $note   = $request->input('note');
                $display    = ($request->input('display')==NULL)? 0:1;
                
                $banner         = new Banner();
                $banner->name   = $name;
                $banner->slug   = $slug;
                $banner->image  = $image;
                $banner->note   = $note;
                $banner->display= $display;
                $banner->save();
                return redirect('admin/banner-add')->withErrors('Success');
            }   
        }
        return view('admin.banner.add') ; 
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $banner = Banner::find($id);
        if(!empty($banner)){
            if($request->isMethod('post')){
                $error  = $this->validator($request,'update');
                if($error->fails()){
                    return redirect("admin/banner-edit/$id")->withErrors($error)->withInput();
                }else{
                    $name   = $request->input('name');
                    $slug   = $request->input('slug');
                    $image  = $request->input('image');
                    $note   = $request->input('note');
                    $display    = ($request->input('display')==NULL)? 0:1;

                    
                    $banner->name   = $name;
                    $banner->slug   = $slug;
                    $banner->image  = $image;
                    $banner->note   = $note;   
                    $banner->display= $display; 
                    $banner->save();
                    return redirect("admin/banner-edit/$id")->withErrors('Success');
                }    
            } 
            return view('admin.banner.edit',['banner'=>$banner]) ; 
        }
        return redirect('admin/banner');    
    }
    
    public function delete($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if(isset($id)){
            $banner = Banner::find($id);
            if(!empty($banner))
                $banner->delete();
            return redirect('admin/banner');
        }
        return redirect('admin/banner');   
    }
}
