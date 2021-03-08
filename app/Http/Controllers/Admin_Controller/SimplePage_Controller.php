<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\SimpleSites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SimplePage_Controller extends Base_Controller
{
    
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $simple_page_list = SimpleSites::paginate(10);
        return view('admin.simple_page.index',['simple_page_list'=>$simple_page_list]);
    }

    public function detail($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $simple_page = SimpleSites::find($id);
        if(!empty($simple_page)){
            return view('admin.simple_page.detail',['simple_page'=>$simple_page]);
        }
        return redirect('admin/simple-page');;      
    }

    public function validator($request,$action){
        
        if($action == 'add'){
            return  Validator::make($request->all(),[
                'name'  => 'required|unique:simple_sites,name|max:110',
                'slug'  => 'required|unique:simple_sites,slug',
                'content' => 'required'
            ]);
        }else{
            return  Validator::make($request->all(),[
                'name'  => 'required|max:110',
                'slug'  => 'required|',
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
                return redirect('admin/simple_page-add')->withErrors($error)->withInput();
            }
            else{
                $name       = $request->input('name');
                $slug    = $request->input('slug');
                $content    = $request->input('content');

                $simple_page            = new SimpleSites();
                $simple_page->name      = $name;
                $simple_page->content   = $content;
                $simple_page->slug   = $slug;
                $simple_page->save();
                return redirect('admin/simple-page-add')->withErrors('Success');
            }   
        }
        return view('admin.simple_page.add') ; 
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $simple_page = SimpleSites::find($id);
        if(!empty($simple_page)){
            if($request->isMethod('post')){
                $error  = $this->validator($request,'update');
                if($error->fails()){
                    return redirect("admin/simple_page-edit/$id")->withErrors($error)->withInput();
                }else{
                    $name       = $request->input('name');
                    $slug       = $request->input('slug');
                    $content    = $request->input('content');

                    $simple_page->name      = $name;
                    $simple_page->content   = $content;
                    $simple_page->slug   = $slug;
                    $simple_page->save();
                    return redirect("admin/simple-page-edit/$id")->withErrors('Success');
                }    
            } 
            return view('admin.simple_page.edit',['simple_page'=>$simple_page]) ; 
        }
        return redirect('admin/simple-page');;      
    }
    
    public function delete($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if(isset($id)){
            $simple_page = SimpleSites::find($id);
            if(!empty($simple_page))    
                $simple_page->delete();
            return redirect('admin/simple-page');
        }
        return redirect('admin/simple-page');      
    }
}
