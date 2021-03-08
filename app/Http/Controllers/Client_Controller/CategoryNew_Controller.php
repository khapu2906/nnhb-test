<?php

namespace App\Http\Controllers\Client_Controller;


use App\Http\Controllers\Client_Controller\Base_Controller;
use App\Categorynews;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class Categorynew_Controller extends Base_Controller
{
    public function index($slug=null){
        $category_new_list = CategoryNews::orderBy('left','ASC')->get();
        $category_new_list = showCategory(json_decode(json_encode(current($category_new_list)),true));
        $category_title = [];
        $new_list = new News();
        if($slug != null){
            $category_current = CategoryNews::where('category_new.slug',$slug)->first();
            if($category_current != null){
                $category_title = Categorynews::where([
                                    ['left','<=',$category_current['left']],
                                    ['right','>=',$category_current['right']],
                                ])
                                ->orderBy('category_new.left')->get();
                $new_list = $new_list->select('news.*')->join('category_new','category_new.id','=','category_new_id')
                                                    ->where([
                                                                ['left','>=',$category_current['left']],
                                                                ['right','<=',$category_current['right']],
                                                            ])
                                                    ->orderBy('category_new.left');
            }else{
                return redirect('404');
            }
        }                                  
        $new_list = $new_list->paginate(6);
        return view('client.blog.category.index',[  
                                                    'new_list'          => $new_list,
                                                    'category_new_list' => $category_new_list,
                                                    'category_title'    => $category_title,
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
