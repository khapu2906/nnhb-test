@extends('client.layout')

@section('title', $product['name'])
@section('content')
@parent

  <!-- typical saller -->
<div class="container-fulid head-index" >
    <hr id="space">
    
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / Sản phẩm / {{$product['name']}}
           
        </p>
    </div>
    <div>
        <h3 class="title-product">SẢN PHẨM</h3>
    </div>
    <hr>
</div>
<hr id="space">
<div class="container-fulid display-list" style="min-height: 550px;">
        <div class="row"c id="proId-{{$product['id']}}">
            <div  class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <div class="row ">
                    <ul class="nav nav-tabs">
                         <lI class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#image_primary"><img src="{{$product->image}}" id="product_image_tab" width="100%" ></a>
                        </lI>
                        @if($more_image!==null)            
                            @for($i = 0;$i< count($more_image);$i++)
                                <lI class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#image_more_{{$i}}"><img src="{{$more_image[$i]}}"  id="product_image_tab" width="100%" ></a>
                                </lI>    
                            @endfor
                        @endif
                    </ul>    
                </div>    
            </div>
            <div  class="col-xs-11 col-sm-11 col-md-8 col-lg-8">
                <div class=" row tab-content">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tab-pane active " id="image_primary" >
                        <img src="{{$product->image}}" width="100%" class="product_image_tab_content" >
                    </div>
                    @if($more_image!==null)            
                        @for($i = 0;$i< count($more_image);$i++)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tab-pane fade " id="image_more_{{$i}}">
                            <img src="{{$more_image[$i]}}" width="100%" class="product_image_tab_content" >
                        </div>
                        @endfor
                    @endif
                </div>
            </div>  
            <div  class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="row">
                    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4  id="proName">{{$product->name}}</h4>
                        <p class="id_search_product"><i>{{$product->id_search}}</i></p>
                        <hr class="cartHr">
                        @if($product['encourage_price']==0)
                            <p class="card-text" ><strong><span>{{number_format($product['price'])}}đ</span></strong></p>
                        @else
                            <p class="card-text">
                                <span ><strong>{{number_format($product['encourage_price'])}}đ</strong></span>
                               <strike  style="color:#666666">{{number_format($product['price'])}}đ</strike>
                            </p>    
                        @endif
                        <hr class="cartHr">
                        <div class=" col-lq-12 form-group">
                            <label>SỐ LƯỢNG: </label>
                            <input type="number" id="quantum_input" productId="{{$product->id}}" class="form-control" style="width:20%" min="1" value="1" max="{{$product->quantum}}">
                        </div>
                        <hr class="cartHr">
                        <div class=" col-lq-12 form-group">
                            <a id="buttoncontent"  data-toggle="modal" data-target="#productcontent" href="#"><i class="far fa-hand-point-right"></i> THÔNG TIN SẢN PHẨM</a>
                        <button type="button" class="btn " id="buttoncontent"  data-toggle="modal" data-target="#productcontent">
                        </div>
                        <hr class="cartHr">
                        <div  class="col-lg-12" id="button-product" >
                            <p style="display:none" id="quantum-buy-{{$product['id']}}" class="quantum-{{$product['id']}}">1</p>
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
                    <hr>
                    <hr>
                    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card product-card">
                            <img class="card-img-top" src="" alt="" style="width:100%">
                            <div class="card-body">
                            <a href=""><h6 class="card-title">DANH MỤC SẢN PHẨM</h6></a>
                            <hr class="wall-title">
                            <ul id="catalogUL">
                            @if(!empty($category_product_list))
                                @include('client.product.catalog',['category_product_list' => $category_product_list])
                            @endif
                            </ul>
                                <div>
                                    <script>
                                        var toggler = document.getElementsByClassName("fa-minus");
                                        var togglerMinus = document.getElementsByClassName("fa-minus");
                                        var i;
                                        for (i = 0; i < toggler.length; i++) {
                                            toggler[i].addEventListener("click", function() {
                                                this.parentElement.querySelector(".nested").classList.toggle("active");
                                                //this.classList.toggle("fa-minus");
                                            });
                                        }  
                                    </script>
                                </div>
                            </div>
                        </div>
                    <hr id="space">
                </div>    
                    </div>
                </div>
            </div>
        </div>           
    </div>    
</div>
<hr id="space">
<div class="modal fade " id="productcontent" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >
                    <div class="modal-dialog modal-lg" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <div class="modal-header" ><h4>Thông tin sản phẩm</h4></div>
                        <div class="modal-body">
                           <div class="row">
                               <div class="col-lg-12">
                                        {!!$product->note!!}
                               </div>
                           </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeProduct" onclick="drawCheckout()">Close</button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
</div>                

@endsection