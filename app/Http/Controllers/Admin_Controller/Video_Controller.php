<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Http\Controllers\Admin_Controller\Base_Controller;

use App\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Video_Controller extends Base_Controller
{
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $video_list = Videos::paginate(10);
        return view('admin.video.index',['video_list'=>$video_list]);
    }

    public function display(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if($request->ajax()){
            $video = Videos::find($request->input('id'));
            $display = ($request->input('display')== 1)? 0:1;

            $video->display = $display;
            $video->save();
            return 'Success!!!';
        }
    }

    public function validator($request,$action){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if($action == 'add'){
            return  Validator::make($request->all(),[
                'name'  => 'required|unique:video,name|max:110',
                'content' => 'required|unique:video,content'
            ]);
        }else{
            return  Validator::make($request->all(),[
                'name'  => 'required|max:110',
                'content' => 'required'
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
                return redirect('admin/video-add')->withErrors($error)->withInput();
            }
            else{
                $name       = $request->input('name');
                $content    = $request->input('content');
                $display    = ($request->input('display')==NULL)? 0:1;

                $video            = new Videos();
                $video->name      = $name;
                $video->content   = $content;
                $video->display   = $display;
                $video->save();
                return redirect('admin/video-add')->withErrors('Success');
            }   
        }
        return view('admin.video.add') ; 
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $video = Videos::find($id);
        if(!empty($video)){
            if($request->isMethod('post')){
                $error  = $this->validator($request,'update');
                if($error->fails()){
                    return redirect("admin/video-edit/$id")->withErrors($error)->withInput();
                }else{
                    $name       = $request->input('name');
                    $content    = $request->input('content');
                    $display    = ($request->input('display')==NULL)? 0:1;
                    
                    $video->name      = $name;
                    $video->content   = $content;
                    $video->display   = $display;
                    $video->save();
                    return redirect("admin/video-edit/$id")->withErrors('Success');
                }    
            } 
            return view('admin.video.edit',['video'=>$video]);
        }
        return redirect('admin/video');           
    }
    
    public function delete($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if(isset($id)){
            $video = Videos::find($id);
            if(!empty($video))
                $video->delete();
            return redirect('admin/video');
        }
        return redirect('admin/video');       
    }
}
