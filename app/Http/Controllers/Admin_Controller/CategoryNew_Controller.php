<?php

namespace App\Http\Controllers\Admin_Controller;

use App\CategoryNews;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class CategoryNew_Controller extends Base_Controller
{
    //
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $category_new_list = CategoryNews::orderBy('left')->get();
        $category_new_list = showCategoryadmin($category_new_list);
        return view('admin.category_new.index',['category_new_list' =>$category_new_list]);
    }

    public function validator($request,$action){
        if($action =='add'){
            return Validator::make($request,[
                'name' => 'required|unique:category_new,name|max:255',
                'slug' => 'required|unique:category_new,slug',
            ]);
        }else{
            return Validator::make($request,[
                'name' => 'required|max:255',
                'slug' => 'required',
            ]);
        }    
    }

    public function add(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if($request->isMethod('post')){
            $validator = $this->validator($request->all(),'add');
            if($validator->fails()){
                return Redirect('admin/category-new')->withInput()->withErrors($validator); 
            }else{
                $name = $request->input('name');
                $slug = $request->input('slug');
                $parent_id = $request->input('parent_id');
                $amount_chids = 0;
                DB::select('call insert_cata_new_left_right("'.$name.'",'.$parent_id.','.$amount_chids.',"'.$slug.'")');
                return Redirect('admin/category-new')->withInput()->withErrors('Success');
            }
        }
        return Redirect('admin/category-new');
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $category = CategoryNews::find($id);
        if($request->isMethod('post')){
            $validator = $this->validator($request->all(),'edit');
            if($validator->fails()){
                return Redirect("admin/category-new-edit/$id")->withInput()->withErrors($validator); 
            }else{
                $name = $request->input('name');
                $slug = $request->input('slug');
                
                $category->name = $name;                
                $category->slug = $slug;
                $category->save();                
                return Redirect("admin/category-new-edit/$id")->withInput()->withErrors('Success');
            }
        }
        return view('admin.category_new.edit',[ 'category' => $category ]);
    }

    public function delete($id,$parent_id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if(isset($id) && isset($parent_id)){
            DB::select('call delete_cata_new_left_right('.$id.','.$parent_id.')');
        }
        return Redirect('admin/category-new');
    }
}
