@extends('client.layout')

@section('title', 'Danh sách bài viết')
@section('content')
@parent

  <!-- typical saller -->
<div class="container head-index" >
    <hr id="space">
    
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / Danh sách bài viết
            @foreach($category_title as $title)
               / {{$title->name}} 
            @endforeach
        </p>
    </div>
    <div><h3 class="title-new">DANH SÁCH BÀI VIẾT</h3></div>
    <hr>
</div>
<hr id="space">
<div class="container display-list" style="min-height: 450px;">
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="border:black;border:10px">
                <div class="card product-card">
                    <img class="card-img-top" src="" alt="" style="width:100%">
                    <div class="card-body">
                    <a href=""><h6 class="card-title">DANH MỤC BÀI VIẾT</h6></a>
                    <hr class="wall-title">
                    <ul id="catalogUL">
                    @if(!empty($category_new_list))
                        @include('client.blog.catalog',['category_new_list' => $category_new_list])
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
                <div class="row">
                    @if($new_list !=null)
                        @foreach($new_list as $new)
                            @if($new['name']!= null)
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="card new-card row" style="min-height:300px">
                                    <div class=" col-lg-12">
                                        <img class="card-img-top" src="{{$new->image}}" alt="Ảnh của {{$new->name}}" style="width:100%">
                                    </div> 
                                    <div  class="col-lg-12">   
                                        <div><a href="{!!url('bai-viet')!!}/{{$new->slug}}"><h4>{{$new['name']}}</h4></a></div>
                                        <div class="card-body">
                                        <p>{{$new['short_content']}}</p>
                                        </div>
                                    </div>    
                                 </div>
                            </div>
                            <hr id="space">
                            @endif
                        @endforeach    
                    @else
                       <h3>Hiện tại chưa có bài viết nào trong doanh mục này</h3>
                    @endif
                </div>
                <hr id="space">
                {{$new_list->links()}}
            </div>
    </div>    
</div>
<hr id="space">

@endsection