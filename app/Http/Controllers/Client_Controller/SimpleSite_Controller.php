<?php

namespace App\Http\Controllers\Client_Controller;

use App\Http\Controllers\Client_Controller\Base_Controller;
use App\Http\Controllers\Controller;
use App\SimpleSites;
use Illuminate\Http\Request;


class SimpleSite_Controller extends Base_Controller
{
    //
    public function index($slug){
        $site = SimpleSites::where('slug',$slug)->first();
        if(!empty($site)){
            return view('client.single_page',[
                                                'site'          => $site,
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
        return redirect('404');
    }
}
