<?php

namespace App\Http\Controllers\Admin_Controller;

use App\CategoryProduct_Product;
use App\CategoryProducts;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Product_Controller extends Base_Controller
{
    //

    public function index($key=null,$type=null){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $product_list = new Products();
        if($key !=null &&$type!=null){
            $product_list = $product_list->where($type,'like',"%$key%");
        }    
        $product_list = $product_list->paginate(10);
        return view('admin.product.index',['product_list'=>$product_list,'key'=>$key,'type'=>$type]);
    }

    public function detail($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $category_product_list = Products::find($id)->category_products;
        return view('admin.product.detail',['category_product_list' => $category_product_list]);
    }

    public function choose_product($id=null){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if($id == NULL){
            $product_list = Products::all();
        }else{
            $product_list = Products::where('id_search','LIKE','%'.$id.'%')->get();            
        }  
        return view('admin.bill.product.product',['product_list'=>$product_list]);
    }

    public function validator($request,$action){
        if($action=='add'){
            return Validator::make($request,[
                'id_search' => 'required|unique:product,id_search|max:10',
                'name'      => 'required|unique:product,name|max:255',
                'slug'      => 'required|unique:product,slug',
                'category_product_id'      => 'required',
              //  'image'     => 'required',
                'price'     => 'required|min:4',
                'quantum'   => 'required',
            ]);
        }else{
            return Validator::make($request,[
                'id_search' => 'required|max:10',
                'name'      => 'required|max:255',
                'slug'      => 'required',
                'category_product_id'      => 'required',
              //  'image'     => 'required',
                'price'     => 'required|min:4',
                'quantum'   => 'required',
            ]);
        }
    }

    public function add(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $category_product_list = CategoryProducts::orderBy('left')->get();
        $category_product_list = showCategoryadmin($category_product_list);
        if($request->isMethod('post')){
            $validator = $this->validator($request->all(),'add');
            if($validator->fails()){
                return redirect('admin/product-add')->withInput()->withErrors($validator);
            }else{
                $id_search           = $request->input('id_search');
                $name                = $request->input('name');
                $slug                = $request->input('slug');
                $image               = $request->input('image');
                $price               = $request->input('price');
                $encourage_price     = ($request->input('encourage_price')=='')?0:$request->input('encourage_price');
                $note                = $request->input('note');
                $quantum             = $request->input('quantum');
                $more_image = [];
                for($i = 1;$i<5;$i++){
                    if($request->input("image_$i")!=''){
                        array_push($more_image,$request->input("image_$i"));
                    }
                }
                $more_image = json_encode($more_image);
               // dd($more_image);
                
                $id = DB::table('product')->insertGetId(
                    [
                        'id_search'        => $id_search,
                        'name'             => $name,
                        'slug'             => $slug,
                        'image'            => $image,
                        'more_image'            => $more_image,
                        'price'            => $price,
                        'encourage_price'  => $encourage_price,
                        'note'             => $note,
                        'quantum'          => $quantum
                    ]
                );
                $category_product_id = addCategoryProductId($id,$request->input('category_product_id'));
                DB::table('categoryproduct_product')->insert($category_product_id);
                return redirect('admin/product-add')->withInput()->withErrors('Success');
            }
        }
        return view('admin.product.add',['category_product_list'=>$category_product_list]);   
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $category_product_list = CategoryProducts::orderBy('left')->get();
        $category_product_list = showCategoryadmin($category_product_list);
        $product = Products::find($id);
        if(!empty($product)){
            $category_product = Products::find($id)->category_products;
            $category_product_id = CateogryIdtoString($category_product);
            $category_product_name = CategoryName($category_product);
            //dd($category_product_id);
            if($request->isMethod('post')){
                $validator = $this->validator($request->all(),'edit');
                if($validator->fails()){
                    return redirect("admin/product-edit/$id")->withInput()->withErrors($validator);
                }else{
                    $id_search           = $request->input('id_search');
                    $name                = $request->input('name');
                    $slug                = $request->input('slug');
                    $image               = $request->input('image');
                    $price               = $request->input('price');
                    $encourage_price     = ($request->input('encourage_price')=='')?0:$request->input('encourage_price');
                    $note                = $request->input('note');
                    $quantum             = $request->input('quantum');
                    $more_image = [];
                    for($i = 1;$i<5;$i++){
                        if($request->input("image_$i")!=''){
                            array_push($more_image,$request->input("image_$i"));
                        }
                    }
                    $more_image = json_encode($more_image);
                    
                    $product->id_search = $id_search;
                    $product->name  = $name ;
                    $product->slug = $slug;
                    $product->image = $image;
                    $product->more_image = $more_image;
                    $product->price = $price;
                    $product->encourage_price = $encourage_price;
                    $product->note = $note ;
                    $product->quantum = $quantum;
                    $product->save();

                    $category_product_id = addCategoryProductId($id,$request->input('category_product_id'));
                    CategoryProduct_Product::where('product_id',$id)->delete();
                    DB::table('categoryproduct_product')->insert($category_product_id);
                    return redirect("admin/product-edit/$id")->withInput()->withErrors('Success');
                }
            }
            $more_image = json_decode($product->more_image,true);
            return view('admin.product.edit',['category_product_list'=>$category_product_list,
                                              'product'=>$product,
                                              'category_product_id'=>$category_product_id,
                                              'category_product_name'=>$category_product_name,
                                              'more_image'  =>$more_image
                                              ]);   
        }    
        return redirect('admin/product');
    }

    public function delete($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if(isset($id)){
            $product = Products::find($id);
            $product->delete();
            CategoryProduct_Product::where('product_id',$id)->delete();
            return redirect('admin/product');
        }
        return redirect('admin/product');
    }
}
