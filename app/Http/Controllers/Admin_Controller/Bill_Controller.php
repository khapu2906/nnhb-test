<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Bills;
use App\City;
use App\Customers;
use App\Http\Controllers\Admin_Controller\Base_Controller;
use App\Products;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class Bill_Controller extends Base_Controller
{
    
    public function index($where=null){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $code = '';
        $status = '';
        $type = '';
        $date = '';
        $bill_list = new Bills();
        if($where!=null){
            $where = json_decode($where,true);
            if($where['code']!=""){
                $code   = $where['code'];
                $bill_list = $bill_list->where('code','like',"%$code%");
            }else{
                unset($where['code']);
                foreach($where as $key => $value){
                        if($key == 'status'){
                            $status = $value;
                        }else if($key =='type'){
                            $type = $value;
                        }else{
                            $date = $value;
                        }
                    if($value!=""){    
                        $bill_list = $bill_list->where($key,'like',"%$value%");
                    }    
                }
            }
        }    
        $revenue_total = $bill_list->sum('total_sale');
        $bill_list = $bill_list->paginate(10);
        return view('admin.bill.index',[    'bill_list'=>$bill_list,
                                            'code'   => $code,
                                            'status'   => $status,
                                            'type'   => $type,
                                            'date'   => $date,
                                            'revenue_total' => $revenue_total
                                                                    ]);
    }

    public function detail($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $bill = Bills::find($id);
        $customer = json_decode($bill['customer']);
        $customer = (!empty($customer))? $customer:[];
        $bill_detail = json_decode($bill['detail'],true);
        if(!empty($bill_detail)){
            return view('admin.bill.detail',['bill_detail' => $bill_detail,'customer'=>$customer]);
        }
        return null;    
    }

    public function select_status(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        if($request->ajax()){
            $result = [];
            $bill = Bills::find($request->input('id'));
            $status = $request->input('status');
            $default = $request->input('default');

            $bill->status = $status;
            $bill->save();
            if($status == 0){
                $result = [
                    'background' => '#2c6bb2',
                    'color'      => 'white',
                    'value'      => 'New Order'
                ];
                
            }elseif($status == 1){
                $result = [
                    'background' => '#fefd07',
                    'color'      => 'black',
                    'value'      => 'Checked'
                ];
              
            }elseif($status == 2){
                $result = [
                    'background' => '#e88436',
                    'color'      => 'white',
                    'value'      => 'Delivered'
                ];
               
            }elseif($status == 3){
                $result = [
                    'background' => '#55b366',
                    'color'      => 'white',
                    'value'      => 'Success'
                ];
                
            }elseif($status == 4){
                $result = [
                    'background' => '#d8212e',
                    'color'      => 'white',
                    'value'      => 'Cancel'
                ]; 
               
            }
            if($status == 4 && $default < 4){
                $this->update_product_bill($bill->detail);
            }elseif($status < 4 && $default ==4 ){
                $this->update_product_bill($bill->detail,'drop');
            }
            return $result;
        }    
        return 'Error';
    }

    public function validator($request,$action){
        if($action == 'add'){
            return  Validator::make($request->all(),[
                'code'           => 'required|unique:bill,code|max:110',
                'detail'         => 'required',
                'type'           =>  'required',
                'customer'    =>  'required',
                
            ]);
        }else{
            return  Validator::make($request->all(),[
                'code'      => 'required|max:110',
                'detail'    => 'required',
                'type'      => 'required',
                'customer'    =>  'required',
             
            ]);
        }
    
    }

    public function add(Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $citys = City::get();
        if($request->isMethod('post')){
           $error  = $this->validator($request,'add');
            if($error->fails()){
                return redirect('admin/bill-add')->withErrors($error)->withInput();
            }
            else{
                $code        = $request->input('code');
                $type        = $request->input('type');
                $note        = $request->input('note');
                $detail      = $request->input('detail');
                $rate_sale   = $request->input('rate_sale');
                $total       = $request->input('total');
                $total_sale       = $request->input('total_sale');
                $customer    =  $request->input('customer');
                $status     = ($type == 0)? 3 : 0;
                $customer_add = str_replace('[','',$customer);
                $customer_add = str_replace(']','',$customer_add);
                $customer_add = json_encode(json_decode($customer_add,false));
                
                $bill            = new Bills();
                $bill->code      = $code;
                $bill->note      = $note;
                $bill->detail    = $detail;
                $bill->total     = $total;
                $bill->total_sale     = ($total_sale==0)?$total:$total_sale;
                $bill->rate_sale = $rate_sale;
                $bill->status    = $status;
                $bill->type      = $type;
                $bill->customer  = $customer_add;
                
                $bill->save();
                $this->addCusOrder($customer);
                $this->update_product_bill($detail,'drop');
                $this->addHotProduct($detail);
                return redirect('admin/bill-add')->withErrors('Success');
            }   
        }
        return view('admin.bill.add',['citys'=>$citys]) ; 
    }

    public function edit($id,Request $request){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $citys = City::get();
        $bill = Bills::find($id);
            if($request->isMethod('post')){
                $error  = $this->validator($request,'edit');
                if($error->fails()){
                    return redirect("admin/bill-edit/$id")->withErrors($error)->withInput();
                }
                else{
                    $customer_old = $bill->customer;
                    $detail_old   = $bill->detail;
                    $code        = $request->input('code');
                    $type        = $request->input('type');
                    $note        = $request->input('note');
                    $detail      = $request->input('detail');
                    $rate_sale   = $request->input('rate_sale');
                    $total       = $request->input('total');
                    $total_sale       = $request->input('total_sale');
                    $customer    =  $request->input('customer');
                    $status     = ($type == 0)? 3 : 0;
                    $this->addHotProduct($detail,$bill->detail);
                    $customer_add = str_replace('[','',$customer);
                    $customer_add = str_replace(']','',$customer_add);
                    $customer_add = json_encode(json_decode($customer_add,false));

                    $bill->code      = $code;
                    $bill->note      = $note;
                    $bill->detail    = $detail;
                    $bill->total     = $total;
                    $bill->total_sale     = ($total_sale==0)?$total:$total_sale;
                    $bill->rate_sale = $rate_sale;
                    $bill->status    = $status;
                    $bill->type      = $type;
                    $bill->customer  = $customer_add;
                    $bill->save();
                    $this->addCusOrder($customer,$customer_old);
                    $this->update_product_bill($detail_old);
                    $this->update_product_bill($detail,'drop');
                    return redirect("admin/bill-edit/$id")->withErrors('Success');
                }   
            }
            return view('admin.bill.edit',['bill'=>$bill,'citys'=>$citys]) ; 
    }

    public function gate_edit($id){
        if(Auth::user()->role!=0){
            return redirect('admin');
        } 
        $bill = Bills::find($id);
        if($bill->status == 4){
           return redirect("admin/bill-edit/$id");
        }
        return redirect("admin/bill")->withErrors("You can't edit with this status, let select 'Canncel' to edit  ")->withInput();
    }

    private function update_product_bill($bill_detail,$status=NULL){
        $bill_detail  = json_decode($bill_detail);
        $id_destroy = getIdProductInDetail($bill_detail);
        $product    = new Products();
        $product    = $product->find($id_destroy);
        $product    = UpdateProductBill($bill_detail,$product,$status);
        $product    = array_values($product);
        $id_destroy = getIdProductInDetail($bill_detail);
        Products::destroy($id_destroy);
        DB::table('product')->insert($product);
    }
    
    private function addHotProduct($bill_detail,$bill_detail_old=NULL){
        $bill_detail  = json_decode($bill_detail);
        $bill_detail_old = ($bill_detail_old != NULL)?json_decode($bill_detail_old):NULL;
        $data = HotPoint($bill_detail,$bill_detail_old);
        DB::table('hot_product')->insert($data);
    }
   
    private function addCusOrder($customer_detail,$customer_old=null){
        $customer_detail = json_decode($customer_detail,true);
        $customer_detail = current($customer_detail);
        if($customer_old==null){
            $customer= Customers::find($customer_detail['id']);
            $customer->orders += 1;
            $customer->save(); 
        }else{
            $customer_old = json_decode($customer_old,true);
            $customer_new = Customers::find($customer_detail['id']);
            $customer_new->orders += 1;
            $customer_new->save();
            $customer_old = Customers::find($customer_old['id']);
            $customer_old->orders -=1;
            $customer_old->save();
        }
    }

}
