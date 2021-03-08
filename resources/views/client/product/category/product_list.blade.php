       @php $product_list = json_decode($product_list,true); @endphp
        @foreach($product_list as $product)
                            @if($product['name']!= null)
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3" id="product" style="border:black;border:10px">
                                <div class="card product-card" id="proId-{{$product['id']}}" height="500">
                                    <div class="row">
                                    <div style="display:none" id="proIdSearch">{{$product['id_search']}}</div>
                                    <div  class="col-lg-12" id="image-product" >
                                        <img class="card-img-top" src="{{$product['image']}}" alt="{{$product['name']}}"  height="300" style="width:100%">
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
                            <hr id="space">
                            <hr id="space">
                            @endif
        @endforeach
        <p id="countProduct" style="display:none">@isset($count){{$count}}@endisset</p>

        