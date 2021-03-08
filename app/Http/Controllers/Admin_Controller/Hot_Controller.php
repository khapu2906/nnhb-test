<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Http\Controllers\Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Hot_Controller extends Controller
{
    //
    public function index(){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $hot_product_list = Products::select('product.*','point')->join('hot_product','product.id','=','product_id')->orderBy('id','ASC')->get();
        //SumPoint($hot_product_list);
        //dd($hot_product_list);
        return view('admin.analyst.hot');
    }
}
