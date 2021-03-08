<?php

namespace App\Http\Controllers\Admin_Controller;

use App\CategoryNews;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class New_Controller extends Base_Controller
{
    public function index($key=null){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $new_list = News::select('news.*','category_new.name as category_new_name','category_new.id as category_new_id')->leftJoin('category_new','category_new.id','category_new_id');
        if($key!=null){
            $new_list = $new_list->where('name','like',"%$key%");
        }
        $new_list = $new_list->paginate(5);
        return view('admin.new.index',['new_list'=> $new_list]);
    }

    public function detail($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $new = DB::select("SELECT news.`id`,news.`name`,`image`,`content`,news.`slug`,category_new.`name` AS category_name FROM `news` INNER JOIN `category_new` ON news.`category_new_id` = category_new.`id` WHERE news.`id`= $id");
        if(empty($new)){
            $new = News::where('id',$id)->get();
        }
        return view('admin.new.detail',['new'=> $new]);
    }

    public function validator($request,$action){
        if($action =='add'){
            return Validator::make($request,[
                'name' => 'required|unique:news,name|max:110',
                'slug' => 'required|unique:news,slug',
                'content' => 'required|unique:news,content',
                'date' => 'required|unique:news,content',
            ]);
        }else{
            return Validator::make($request,[
                'name' => 'required|max:110',
                'slug' => 'required',
                'content' => 'required',
                'date' => 'required|'
            ]);
        }    
    }

    public function add(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $category_new_list = CategoryNews::orderBy('left')->get();
        $category_new_list = showCategoryadmin($category_new_list);
        if($request->isMethod('post')){
            $validator = $this->validator($request->all(),'add');
            if($validator->fails()){
                return redirect('admin/new-add')->withInput()->withErrors($validator);
            }else{
                $name = $request->input('name');
                $slug = $request->input('slug');
                $image = $request->input('image');
                $date = $request->input('date');
                $short_content = $request->input('short_content');
                $content = $request->input('content');
                $category_new_id = $request->input('category_new_id');

                $new = new News();
                $new->name = $name;
                $new->slug = $slug;
                $new->image = $image;
                $new->date = $date;
                $new->short_content = $short_content;
                $new->content = $content;
                $new->category_new_id = $category_new_id;
                $new->save();

                return redirect('admin/new-add')->withInput()->withErrors('Success');
            }
    
        }
        return view('admin.new.add',['category_new_list'=>$category_new_list]);
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $category_new_list = CategoryNews::orderBy('left')->get();
        $category_new_list = showCategoryadmin($category_new_list);
        $new =  News::find($id);
        $category_new = $new->category_new;
        if($request->isMethod('post')){
            $validator = $this->validator($request->all(),'edit');
            if($validator->fails()){
                return redirect("admin/new-edit/{$id}")->withInput()->withErrors($validator);
            }else{
                $name = $request->input('name');
                $slug = $request->input('slug');
                $image = $request->input('image');
                $date = $request->input('date');
                $short_content = $request->input('short_content');
                $content = $request->input('content');
                $category_new_id = $request->input('category_new_id');

                $new->name = $name;
                $new->slug = $slug;
                $new->image = $image;
                $new->date = $date;
                $new->short_content = $short_content;
                $new->content = $content;
                $new->category_new_id = $category_new_id;
                $new->save();

                return redirect("admin/new-edit/{$id}")->withInput()->withErrors('Success');
            }
    
        }
        return view('admin.new.edit',[  'new' => $new,
                                        'category_new' => $category_new,
                                        'category_new_list'=>$category_new_list]);
    }

    public function delete($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if(isset($id)){
            $new = News::find($id);
            if(!empty($new))
                $new->delete();
            return redirect('admin/new');
        }
        return redirect('admin/new');    
    }
}
