<?php

namespace App\Http\Controllers\Client_Controller;


use App\Http\Controllers\Client_Controller\Base_Controller;
use App\CategoryProducts;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;

class CategoryProduct_Controller extends Base_Controller
{
    //
    public function index($slug=null){
        $category_product_list = CategoryProducts::orderBy('left','ASC')->get();
        $category_product_list = showCategory(json_decode(json_encode(current($category_product_list)),true));
        $category_title = [];
        $land = 2;
        return view('client.product.category.index',[ 
                                                    'category_product_list' => $category_product_list,
                                                    'category_title'    => $category_title,
                                                    'slug'          => $slug,
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

    public function product_list($land=null,$slug=null,$sort=null){
        $product_list = new Products();
        $sort = ($sort == null)? "product.name,DESC": $sort;
        $sort = explode(",",$sort);
        if($slug != null){
            $category_current = CategoryProducts::where('category_product.slug',$slug)->first();
            if($category_current != null){
                $category_title = CategoryProducts::where([
                                    ['left','<=',$category_current['left']],
                                    ['right','>=',$category_current['right']],
                                ])
                                ->orderBy('category_product.left')->get();
                $product_list = $product_list->select('product.*')->join('categoryproduct_product','product.id','=','product_id')
                                                    ->join('category_product','category_product.id','=','category_product_id')
                                                    ->where([
                                                                ['left','>=',$category_current['left']],
                                                                ['right','<=',$category_current['right']],
                                                            ])
                                                    ->orderBy('category_product.left');
            }                                       
        }                                  
        $product_list = $product_list->orderBy("$sort[0]","$sort[1]")->distinct();
        $count = $product_list->count('product.id');
        $product_list = $product_list->skip(0)->take($land)->get();
        $product_list = json_encode($product_list);
        return view('client.product.category.product_list',['product_list' => $product_list,'count' => $count]);
    }
}
