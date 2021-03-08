<?php

namespace App\Http\Controllers\Client_Controller;

use App\Bills;
use App\City;
use App\Customers;
use App\District;
use App\Http\Controllers\Client_Controller\Base_Controller;
use App\Products;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Pay_Controller extends Base_Controller
{

    public function index($id=null){
        $citys = City::get();
        if(Auth::check() && Auth::user()->role ==1 && $id==null){
            $customer_list = User::find(Auth::user()->id)->customers;
            return view('client.cart.mem_pay',[ 'menu'          =>$this->menu,
                                                'name'          => $this->name,
                                                'mail'          => $this->mail,
                                                'phone'         => $this->phone,
                                                'place'         => $this->place,
                                                'time'          => $this->time,
                                                'youtube'       => $this->youtube,
                                                'instagram'     => $this->instagram,
                                                'facebook'      => $this->facebook,
                                                'citys'          => $citys,
                                                'customer_list' => $customer_list,  
                                                ]);
        }
        $cus_name       = '';
        $cus_birthday   = '';
        $cus_phone = '';
        $cus_email = '';
        $cus_note = '';
        $place = '';
        $ward = '';
        $district = '';
        $city = '';

        if($id!= null){
            $customer = Customers::find($id);
            $cus_name       = $customer->name;
            $cus_birthday   = $customer->birthday;
            $cus_phone = $customer->phone;
            $cus_email = ($customer->email=='')?Auth::user()->email:$customer->email;
            $cus_note = $customer->note;
            $places = explode('_',$customer->place);
            $place = (isset($places['0']))?$places['0']:'';
            $ward = (isset($places['1']))?$places['1']:'';
            $district = (isset($places['2']))?$places['2']:'';
            $city = (isset($places['3']))?$places['3']:'';
        }
        return view('client.cart.cus_pay',[ 'menu'           =>$this->menu,
                                        'name'               => $this->name,
                                        'mail'               => $this->mail,
                                        'phone'              => $this->phone,
                                        'place'              => $this->place,
                                        'time'               => $this->time,
                                        'youtube'            => $this->youtube,
                                        'instagram'          => $this->instagram,
                                        'facebook'           => $this->facebook,
                                        'citys'              => $citys, 
                                        'cus_name'          => $cus_name,  
                                        'cus_birthday'      => $cus_birthday ,  
                                        'cus_phone'         => $cus_phone,  
                                        'cus_email'         => $cus_email,  
                                        'cus_note'          => $cus_note,  
                                        'place'             => $place,  
                                        'ward'              => $ward,  
                                        'district'          => $district,  
                                        'city'              => $city,  
                                        ]);
    }    //

    public function validator($request){
            return Validator::make($request->all(),[
                'name' =>'required|max:55|min:5',
                'phone'=>'required|max:11|min:9',
                'email'=>'email|max:220|',
                'place'=>'required',
                'city'=>'required',
                'district'=>'required',
                'ward'=>'required',
                'detail'=> 'required|min:15',
            ]);
    }

    public function add(Request $request){
       $validator = $this->validator($request);
       if($validator->fails()){
           return redirect()->back()->withInput()->withErrors($validator);
       }else{
           $name = $request->input('name');
           $email = $request->input('email');
           $birthday = $request->input('birthday');
           $phone = $request->input('phone');
           $place = $request->input('place').'_'.$request->input('ward').'_'.$request->input('district').'_'.$request->input('city');
           $note = $request->input('note');
           $detail = $request->input('detail');
           $total = $request->input('total');

           $customer = Customers::where('phone',$phone)->first();
           $customer = (!empty($customer))? $customer : new Customers;
           $customer->name = $name;
           $customer->email= $email;
           $customer->birthday = $birthday;
           $customer->phone = $phone;
           $customer->place = $place;
           $customer->user_id = (Auth::check())?Auth::user()->id:NULL;
           $customer->note = $note;
           $customer->orders = $customer->orders +1;
           $customer->save();

           $customer_deatil = $customer->orderBy('updated_at','DESC')->first();
           $customer_deatil = json_encode(json_decode($customer_deatil,true));
           $bill = new Bills;
           $code = $bill->where('type','2')->count('id') + 1;
           $bill->code = 'WEB'.$code;
           $bill->note = $note;
           $bill->detail = $detail;
           $bill->total = $total;
           $bill->total_sale = $total;
           $bill->status = 0;
           $bill->type = 2;
           $bill->customer = $customer_deatil;
           $bill->save();

           $this->addHotProduct($detail);
           $this->update_product_bill($detail,'drop');

           return redirect("thanh-toan-thanh-cong/$bill->code");
       }
    }

    public function success($code){
        return view('client.cart.success',['menu'          =>$this->menu,
                                            'name'          => $this->name,
                                            'mail'          => $this->mail,
                                            'phone'         => $this->phone,
                                            'place'         => $this->place,
                                            'time'          => $this->time,
                                            'youtube'       => $this->youtube,
                                            'instagram'     => $this->instagram,
                                            'facebook'      => $this->facebook,
                                            'code'          => $code  
                                                                                    ]);

    }

    public function district($id){
            $district_list = City::find($id)->districts;
            return $district_list;
    }

    public function ward($id){
            $ward_list = District::find($id)->wards;
            return $ward_list;
    }

    public function addHotProduct($bill_detail,$bill_detail_old=NULL){
        $bill_detail  = json_decode($bill_detail);
        $bill_detail_old = ($bill_detail_old != NULL)?json_decode($bill_detail_old):NULL;
        $data = HotPoint($bill_detail,$bill_detail_old);
        DB::table('hot_product')->insert($data);
    }

    public function update_product_bill($bill_detail,$status=NULL){
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
}
