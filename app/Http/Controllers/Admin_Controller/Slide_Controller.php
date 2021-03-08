<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\Slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class Slide_Controller extends Base_Controller
{
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $slide_list = Slides::paginate(10);
        return view('admin.slide.index',['slide_list'=>$slide_list]);
    }

    public function validator($request,$action){
        if($action == 'add'){
            return  Validator::make($request->all(),[
                'name'  => 'required|unique:slide,name|max:110',
                'slug'  => 'required|unique:slide,slug',
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
                return redirect('admin/slide-add')->withErrors($error)->withInput();
            }
            else{
                $name   = $request->input('name');
                $slug   = $request->input('slug');
                $image  = $request->input('image');
                $note   = $request->input('note');
                
                $slide         = new Slides();
                $slide->name   = $name;
                $slide->slug   = $slug;
                $slide->image  = $image;
                $slide->note   = $note;
                $slide->save();
                return redirect('admin/slide-add')->withErrors('Success');
            }   
        }
        return view('admin.slide.add') ; 
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $slide = Slides::find($id);
        if(!empty($slide)){
            if($request->isMethod('post')){
                $error  = $this->validator($request,'update');
                if($error->fails()){
                    return redirect("admin/slide-edit/$id")->withErrors($error)->withInput();
                }else{
                    $name   = $request->input('name');
                    $slug   = $request->input('slug');
                    $image  = $request->input('image');
                    $note   = $request->input('note');

                    
                    $slide->name   = $name;
                    $slide->slug   = $slug;
                    $slide->image  = $image;
                    $slide->note   = $note;    
                    $slide->save();
                    return redirect("admin/slide-edit/$id")->withErrors('Success');
                }    
            } 
            return view('admin.slide.edit',['slide'=>$slide]) ; 
        }   
        return redirect('admin/slide');   
    }
    
    public function delete($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if(isset($id)){
            $slide = Slides::find($id);
            if(!empty($slide))
                $slide->delete();
            return redirect('admin/slide');
        }
        return redirect('admin/slide');    
    }
}
