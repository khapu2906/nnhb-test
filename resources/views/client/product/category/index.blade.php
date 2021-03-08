@extends('client.layout')

@section('title', 'Danh sách sản phẩm')
@section('content')
@parent

  <!-- typical saller -->
  <hr id="space">
<div class="container-fulid head-index" >
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / Danh sách sản phẩm
            @foreach($category_title as $title)
               / {{$title->name}} 
            @endforeach
        </p>
    </div>
    <div style=""><h3 class="title-new">   DANH SÁCH SẢN PHẨM</h3></div>
</div>
<hr id="space">
<hr>
<div class="container-fulid  display-list" style="min-height: 450px;">
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="border:black;border:10px">
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
            </div>
            <hr id="space">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div style="float: right;">
            <select  class="custom-select" id="sortProduct" style="border-top:0px;border-left: 0px; ">
                    <option  value="product.name,DESC">Tên sản phẩm: từ cao tới thấp</a></option>
                    <option value="product.name,ASC">Tên sản phẩm: thấp  tới cao</option>
                    <option value="product.price,DESC">Giá sản phẩm: từ cao tới thấp</option>
                    <option value="product.price,ASC">Giá sản phẩm: từ thấp tới cao</option>
                    <option value="product.quantum,DESC">Số lượng sản phẩm: từ cao tới thấp</option>
                    <option value="product.quantum,ASC">Số lượng sản phẩm: từ thấp tới cao</option>
                </select>              
            </div>
            <div><h4 class="title-new">Tất cả sản phẩm</h4></div>
            <hr id="space">
                   
                <div class="row" id="productList" url="{{url('product_list')}}">
                      <div>
                        <div class="spinner-grow" style="background: #4a552a"></div>
                        <div class="spinner-grow" style="background: #4a552a"></div>
                        <div class="spinner-grow" style="background: #4a552a"></div>
                        <div class="spinner-grow" style="background: #4a552a"></div>
                        <div class="spinner-grow" style="background: #4a552a"></div>
                        <div class="spinner-grow" style="background: #4a552a"></div>
                        <div class="spinner-grow" style="background: #4a552a"></div>
                      </div>          
                </div>
                <hr id="space">
               <div style="text-align:center">
                    <input type="hidden" id="inputLoad" slug="{{$slug}}"  value="16">
                    <button type="button" id="loadMore"  class="btn" >XEM THÊM</button>
               </div>
            </div>
    </div>    
</div>
<hr id="space">

@endsection