<?php

namespace App\Http\Controllers\Client_Controller;

use App\CategoryNews;
use App\Http\Controllers\Client_Controller\Base_Controller;
use App\Http\Controllers\Controller;
use App\News;

use Illuminate\Http\Request;

class New_Controller extends Base_Controller
{
    //
    public function index($slug){
        $category_new_list = CategoryNews::orderBy('category_new.left')->get();
        $category_new_list = showCategory(json_decode(json_encode(current($category_new_list)),true));
        $new = News::where('slug',$slug)->first();
        if(empty($new)){
            return redirect('404');
        }
        $new_invole_list =  News::where('category_new_id',$new->category_new_id)->where('id','<>',$new->id)->limit(6)->get();
        
        return view('client.blog.detail.index',[   
                                                    'new'           => $new,
                                                    'new_invole_list'   => $new_invole_list,
                                                    'category_new_list' => $category_new_list,
                                                    'menu'          =>$this->menu,
                                                    'name'          => $this->name,
                                                    'mail'          => $this->mail,
                                                    'phone'         => $this->phone,
                                                    'place'         => $this->place,
                                                    'time'          => $this->time,
                                                    'youtube'       => $this->youtube,
                                                    'instagram'     => $this->instagram,
                                                    'facebook'      => $this->facebook
                                                ]);
    }                                            
}
