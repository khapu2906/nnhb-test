<?php

namespace App\Http\Controllers\Client_Controller;

use App\Http\Controllers\Controller;
use App\Agency;
use Illuminate\Http\Request;

class Agency_Controller extends Base_Controller
{
    //
    public function index(){
        $agency_list = Agency::orderBy('name','DESC')->paginate(10);
        if(!empty($agency_list)){
            return view('client.agency.index',[
                                                'agency_list'          => $agency_list,
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
        return redirect('404');
    }
}
