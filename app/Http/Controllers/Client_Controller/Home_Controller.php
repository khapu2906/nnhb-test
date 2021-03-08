<?php

namespace App\Http\Controllers\Client_Controller;

use App\Http\Controllers\Client_Controller\Base_Controller as Base_Controller;
use App\Banner;
use App\News;
use App\Partners;
use App\Products;
use App\Slides;
use App\Videos;

class Home_Controller extends Base_Controller
{
    public function index(){
        $slide_list     = Slides::get();
        $count_slide    = count($slide_list);
        $banner_list    = Banner::where('display',1)->orderBy('updated_at','DESC')->first();
        $product_list   = Products::limit(8)->where('encourage_price','>','0')->get();
        $video_list     = Videos::where('display',1)->orderBy('updated_at','DESC')->first();
        $new_list       = News::limit(7)->get();
    
        return view('client/home/index',[   
                                            'slide_list'    => $slide_list,
                                            'count_slide'   => $count_slide,
                                            'product_list'  => $product_list,
                                            'banner_list'   => $banner_list,
                                            'video_list'    => $video_list,
                                            'new_list'      => $new_list,
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
