@extends('client.layout')

@section('title', $new['name'])
@section('content')
@parent

  <!-- typical saller -->
<div class="container head-index" >
    <hr id="space">
    
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / Bài viết / {{$new['name']}}
           
        </p>
    </div>
    <div>
        <h3 class="title-new">{{$new['name']}}</h3>
        <span id="title-child"><i class="far fa-calendar-alt"></i><i>{{date('d/m/Y',strtotime($new['created_at']))}}</i></span>
    </div>
    <hr>
</div>
<hr id="space">
<div class="container-fulid display-list" style="min-height: 450px;">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="border:black;border:10px;z-index:99">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="border:black;border:10px">
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
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="border:black;border:10px">
                        <div class="card product-card">
                            <div class="card-body">
                                <a href=""><h6 class="card-title">BÀI VIẾT LIÊN QUAN</h6></a>
                                <hr class="wall-title">
                                <ul id="catalogUL">
                                    @foreach($new_invole_list as $new_invole)
                                    <div class="row">
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                        <img class="card-img-top" src="{{$new_invole['image']}}" alt="" style="width:70%">
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <li style='text-decoration: none;'><a href="{!!url('bai-viet')!!}/{{$new_invole['slug']}}">{{$new_invole['name']}}</a></li>
                                            <span id="title-child"><i class="far fa-calendar-alt"></i><i>{{date('d/m/Y',strtotime($new_invole['created_at']))}}</i></span>
                                        </div>
                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>    
                </div>    
            </div>
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <hr id="space">
                <div>
                    {!!$new['content']!!}
                </div>
            </div>
           
    </div>    
</div>
<hr id="space">

@endsection