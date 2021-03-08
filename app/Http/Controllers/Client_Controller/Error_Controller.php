<?php

namespace App\Http\Controllers\Client_Controller;

use App\Http\Controllers\Client_Controller\Base_Controller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Error_Controller extends Base_Controller
{
    //
    public function index(){
        return view('client.404',[
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
