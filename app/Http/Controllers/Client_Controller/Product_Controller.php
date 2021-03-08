<?php

namespace App\Http\Controllers\Client_Controller;

use App\CategoryProducts;
use App\Http\Controllers\Client_Controller\Base_Controller;
use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;

class Product_Controller extends Base_Controller
{
    //
    public function index($slug){
        $category_product_list = CategoryProducts::orderBy('category_product.left')->get();
        $category_product_list = showCategory(json_decode(json_encode(current($category_product_list)),true));
        $product = Products::where('slug',$slug)->first();
        if(empty($product)){
            return redirect('404');
        }
        $more_image = json_decode($product->more_image,true); 
        return view('client.product.detail.index',[   
            'product'           => $product,
            'category_product_list' => $category_product_list,
            'menu'          =>$this->menu,
            'name'          => $this->name,
            'mail'          => $this->mail,
            'phone'         => $this->phone,
            'place'         => $this->place,
            'time'          => $this->time,
            'youtube'       => $this->name,
            'instagram'     => $this->instagram,
            'facebook'      => $this->facebook,
            'more_image'    => $more_image
        ]);

    }
}
