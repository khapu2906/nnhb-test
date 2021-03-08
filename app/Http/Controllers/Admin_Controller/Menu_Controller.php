<?php

namespace App\Http\Controllers\Admin_Controller;


use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class Menu_Controller extends Base_Controller
{
    //
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $menu_list = Menu::orderBy('left')->get();
        $menu_list = showCategoryadmin($menu_list);
        return view('admin.menu.index',['menu_list' =>$menu_list]);
    }

    public function validator($request,$action){
        if($action =='add'){
            return Validator::make($request,[
                'name' => 'required|unique:menu,name|max:255',
                'slug' => 'required|unique:menu,slug',
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
                return Redirect('admin/menu')->withInput()->withErrors($validator); 
            }else{
                $name = $request->input('name');
                $slug = $request->input('slug');
                $parent_id = $request->input('parent_id');
                $amount_chids = 0;
                DB::select('call insert_menu_left_right("'.$name.'",'.$parent_id.','.$amount_chids.',"'.$slug.'")');
                return Redirect('admin/menu')->withInput()->withErrors('Success');
            }
        }
        return Redirect('admin/menu');
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $category = Menu::find($id);
        if($request->isMethod('post')){
            $validator = $this->validator($request->all(),'edit');
            if($validator->fails()){
                return Redirect("admin/menu-edit/$id")->withInput()->withErrors($validator); 
            }else{
                $name = $request->input('name');
                $slug = $request->input('slug');
                
                $category->name = $name;                
                $category->slug = $slug;
                $category->save();                
                return Redirect("admin/menu-edit/$id")->withInput()->withErrors('Success');
            }
        }
        return view('admin.menu.edit',[ 'category' => $category ]);
    }

    public function delete($id,$parent_id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if(isset($id) && isset($parent_id)){
            DB::select('call delete_menu_left_right('.$id.','.$parent_id.')');
        }
        return Redirect('admin/menu');
    }
}
