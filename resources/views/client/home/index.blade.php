@extends('client.layout')

@section('title','HTX Nông nghiệp Hòa Bình')
@section('content')
@parent
  <!-- The slideshow -->
<div class="container-fluid">
    <div id="slide" class="carousel slide" data-ride="carousel">
        
            <ul class="carousel-indicators">
            @for($i = 0;$i<$count_slide;$i++)
                <li data-target="#slide" data-slide-to="{!!$i!!}"  @if($i==0) @php echo 'class="active"' @endphp @endif></li>
            @endfor    
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
            @php $i = 0 @endphp
            @foreach($slide_list as $slide)
                <div class="carousel-item @if($i==0) @php echo 'active' @endphp @endif">
                    <img style="width:100%" src="{{$slide['image']}}" alt="{{$slide['name']}}">
                </div>
                @php $i++ @endphp
            @endforeach    
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#slide" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#slide" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            </a>
        
    </div>
</div>    
  <!-- typical saller -->
<hr id="space">
<h1 class="title">SẢN PHẨM MỚI</h1>
<hr id="space">
<div class="container">
    <div class="row">
        @foreach($product_list as $product)
             @if($product['name']!= null)
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" id="product" style="border:black;border:10px">
                    <div class="card product-card" id="proId-{{$product['id']}}" height="500">
                        <div class="row">
                            <div style="display:none" id="proIdSearch">{{$product['id_search']}}</div>
                            <div  class="col-lg-12" id="image-product" >
                                <img class="card-img-top" src="{{$product['image']}}" alt="{{$product['name']}}"  height="250" style="width:100%">
                            </div>
                            <hr>
                            <div class="card-body col-lq-12">
                                <a href="{!!url('san-pham')!!}/{{$product['slug']}}"><h4 class="card-title" id="proName">{{$product['name']}}</h4></a>
                                    @if($product['encourage_price']==0)
                                        <p class="card-text" style="color:#f94c43"><span>{{number_format($product['price'])}}đ</span></p>
                                    @else
                                        <p class="card-text">
                                            <span style="color:#f94c43" >{{number_format($product['encourage_price'])}}đ</span>
                                            <strike  style="color:#666666">{{number_format($product['price'])}}đ</strike>
                                        </p>    
                                    @endif
                            </div>
                            <div  class="col-lg-12" id="button-product" >
                                <p style="display:none" id="quantum-buy-{{$product['id']}}">1</p>
                                <p style="display:none" id="proPrice">{{$product['price']}}</p>
                                <p style="display:none" id="proEncouragePrice">{{$product['encourage_price']}}</p>
                                <p style="display:none" id="proSlug}">{{$product['slug']}}</p>
                                @if($product['quantum'] >0)
                                    <button class="btn addCart"  onclick="addItemtoCart({{$product['id']}})" >Thêm vào giỏ hàng</button>
                                @else
                                    <h5><span style="color:#f94c43" >Sản phẩm tạm hết!!</span></h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr id="space">
                </div>
            @endif
        @endforeach
    </div>
    <div  id="button-product"><a href="{{url('danh-sach-san-pham')}}" style="color:#4a552a;text-decoration: none;"><h5>Xem thêm</h5><a></div>
</div>
  <!-- banner -->
  <hr id="space">
<div class="container-fluid">
        <img style="width:100%" src="{{$banner_list['image']}}" alt="{{$banner_list['name']}}">
</div>
<hr id="space">
@if(!empty($video_list))
<h1 class="title">HTX Nông nghiệp Hòa Bình CHANNEL</h1>
<hr id="space">
  <!-- video -->
<div class="container-fluid">
        <iframe  src="https://www.youtube.com/{{$video_list['content']}}" class="video" height="600px" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>    
@endif
   <!-- blog -->   
<hr id="space">
<h1 class="title">BÀI VIẾT</h1>
<hr id="space">
<div class="container">
            <div class="row">
                @if($new_list != NULL)
                    @for($i = 0; $i < 1 ; $i++)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                            <div class="card product-card" >
                                <img class="card-img-top" src="{{$new_list[0]['image']}}" alt="{{$new_list[0]['name']}}" style="width:100%">
                                <div class="card-body">
                                    <a href="{{url('bai-viet')}}/{{$new_list[0]['slug']}}"><h4 class="card-title">{{$new_list[0]['name']}}</h4></a>
                                        <p>{!!$new_list[0]['short_content']!!}</p>  
                                </div>
                            </div>
                        </div>
                    @endfor
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="row">
                        @for($i = 1; $i < count($new_list) ; $i++)
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" >
                                <div class="media border p-3 product-card"  style="border:0;">
                                    <img src="{{$new_list[$i]['image']}}" alt="{{$new_list[$i]['name']}}" class="mr-3 mt-3 " style="width:20%;">
                                        <div class="media-body">
                                            <a href="{{url('bai-viet')}}/{{$new_list[$i]['slug']}}" style="color:black"><h4 class="card-title">{{$new_list[$i]['name']}}</h4></a>
                                                <p>{!!$new_list[$i]['short_content']!!}</p>
                                        </div> 
                                </div>
                                <hr id="space">    
                            </div>
                        @endfor
                        </div>
                    </div>
                @elseif(empty($new_list))
                @endif
                
            </div>
</div>
<!-- đối tác -->
<hr id="space">
@endsection