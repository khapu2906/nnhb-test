<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewpost" content="width = device-width, initial-scale = 1.0">
        <meta name="author" content="">
        <meta name="description" content="">
        <title>@yield('title')</title>
        <base href="{{asset('/')}}">
        <LINK REL="SHORTCUT ICON"  href="{{asset('public/resources/images/logo_brand/logo.jpg')}}" >
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="icon" href="http://getbootstrap.com/favicon.ico"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('public/resources/client/css//main.css')}}" type="text/css" > 
        <link rel="stylesheet" href="{{asset('public/resources/client/css//new.css')}}" type="text/css" > 
        <link rel="stylesheet" href="{{asset('public/resources/client/css//carousel.less')}}" type="text/css" > 
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    </head>
    <body>
        <div id="overBack">
        </div>
        <div class="content">
                <header class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <span style="margin-left:30px">Số điện thoại: {!!$phone!!} | Thời gian: {!!$time!!}</span>
                        </div>    
                        <div class="col-lg-6" id="actionLogin">
                                @if(Auth::check() &&Auth::user()->role ==1)
                                    <span class="logout"> 
                                        <a href="{{url('member/logout')}}"><button type="button" style="border-radius:0px" class="login btn btn-primary" >
                                            Đăng Xuất
                                        </button></a>
                                    </span>
                                    <span class="profile"> 
                                    <a href="{{url('member')}}">
                                        <button type="button" style="border-radius:0px" class="login btn btn-primary" >
                                            {{Auth::user()->accountname}}
                                        </button>
                                    </a>
                                    </span>
                                @else
                                <span class="login"> 
                                    <button type="button" style="border-radius:0px" class="login btn btn-primary" data-toggle="modal" data-target="#formLogin">
                                        Đăng nhập
                                    </button>
                                </span>
                                @endif
                            <hr id="space">
                        </div>
                </header>
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md menu container-fluid">
                        <span class="logo" >
                                <a href=""><img  src="{{asset('public/resources/images/logo_brand/logo.jpg')}}" alt="logo"/></a>
                                <button style="float: right" class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                                    <i class="fas fa-bars"></i>
                                </button>
                        </span>
                        <div class="collapse navbar-collapse" id="collapse_target">
                            <div>
                            <ul class="navbar-nav">
                                @if(!empty($menu))
                                    @foreach($menu as $me)
                                        @if($me['level'] == 0 && $me['amount_childs'] == 0)
                                            <li class="nav-item" >
                                                <a class="nav-link" href="{{$me['slug']}}">{{$me['name']}}</a>
                                            </li>
                                        @elseif($me['level'] == 0 && $me['amount_childs'] > 0)    
                                        <li class="nav-item" >
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_toggle" href="{{$me['slug']}}">{{$me['name']}}</a>
                                        <span class="caret"></span>
                                        <div class="dropdown-menu dropdown-content" aria-labelledby="dropdown_target">
                                            <div class="row"> 
                                                <div class="col-md-2"></div>  
                                                <div class="col-md-8 row dropdown-detail-content">
                                                    @include('client.menu',['menu' =>$me['child']])
                                                </div>
                                                <div class="col-md-2"></div>  
                                            </div>     
                                        </div>    
                                        @endif
                                    @endforeach
                                @endif    
                            </ul>
                            </div>
                            
                        </div> 
                    </nav>
                </div>
                <div class="container-fluid content" >
                    @yield('content')
                </div>
            </div>
                <footer>
                <div class="container-fluid">
                        <div>
                        <button id="cart" type="button"  >
                            <span><i class="fas fa-angle-left"></i></span>
                            <span><i class='fas fa-shopping-cart' style='font-size:16px'>
                                    <span id="numberProduct">0</span>
                                </i>
                            </span>    
                        </button>
                        </div>
                    <button id="Top" title="Go tole top"><i class="fa fa-chevron-up" style='font-size:22px'></i></button>
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-top:1px" >
                            <h6> THÔNG TIN {{$name}} </h6>
                            <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        {{$place}}
                                    </div> 
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        {{$phone}}
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        {{$time}}
                                    </div>
                            </div>

                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
                            <h6> Link nhanh</h6>
                            <ul style="color:white">
                                <li><a style="color:white" href="">Trang chủ</a></li>
                                <li><a  style="color:white"  href="{{url('danh-sach-san-pham')}}">Danh sách sản phẩm</a></li>
                                <li><a  style="color:white" href="{{url('danh-sach-bai-viet')}}">Danh sách bài viết</a></li>
                                <li><a  style="color:white" href="{{url('gio-hang')}}">Giỏ hàng</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" >
                            <h6> Fanpage</h6>
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSachi-%25C4%2590%25C3%25A0-B%25E1%25BA%25AFc-109054647272046%2F%3Fmodal%3Dadmin_todo_tour&amp;tabs=timeline&amp;width=340&amp;height=200&amp;small_header=true&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="340" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
					</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 link_SO" >
                        <div>
                            <span>---</span>
                            <a href="{{$instagram}}" style="color:white"><span><i class="fab fa-instagram"></i></span></a>
                            <span>---</span>
                            <a href="{{$facebook}}"  style="color:white"><span><i class="fab fa-facebook-square"></i></span></a>
                            <span>---</span>
                            <a href="{{$youtube}}"  style="color:white"><span><i class="fab fa-youtube"></i></span></a>
                            <span>---</span>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 coppy_right">
                            <div>
                            <p> KhaPu  2020</p>
                            </div>
                        </div>
                    </div>   
                </div>     
                <footer>
        </div>
        <div>
            <button id="cart-close" type="button" >
                <span><i class="fas fa-angle-right"></i></span>
                    </i>
                </span>    
            </button>
        </div>
        <div id="Cart">
            <div class="cart-title"><h4>GIỎ HÀNG</h4></div>
            <hr>
            <div class="cart-body" id="cartBody">
                
            </div>
            <div id="TOTAL"></div>
            <div class="cart-button group-form ">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <a href="{{url('gio-hang')}}"><button id="checkCart"class="btn ">Xem giỏ hàng</button></a>
                        <hr>
                    </div>
                    <div class="col-md-12  col-lg-6">
                    <a href="{{url('thanh-toan')}}"><button id="pay" class="btn ">Thanh toán</button></a>
                        <hr>
                    </div>
                </div>    
             </div>
        </div> 
        <div class="modal fade" id="formLogin">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="text-align: center;color:black">Đăng nhập</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('login')}}" method="post" class="needs-validation" novalidate>
                            @csrf
                        <div class="form-group">
                                <label for="email" style="color:black">Email:</label>
                                <input type="mail" name="email" class="form-control" id="email" placeholder="Mời nhập....." name="uname" required>
                                <div class="valid-feedback">Đã điền.</div>
                                <div class="invalid-feedback">Chưa điền dữ liệu.</div>
                            </div>
                            <div class="form-group">
                                <label for="pwd" style="color:black">Mật khẩu:</label>
                                <input type="password" name="password" class="form-control" id="pwd" placeholder="Mời nhập....." name="pswd" required>
                                <div class="valid-feedback">Đã điền.</div>
                                <div class="invalid-feedback">Chưa điền dữ liệu.</div>
                            </div>
                            <button type="submit" class="btn btn-primary login-button" style="width:100%">Đăng nhập</button>
                            <span><a href="{{route('member.login')}}">Đăng ký</a></span>
                        </form>
                    </div>
                </div>
            </div>
    </body>
    <script src="{{asset('public/resources/client/js/jquery-3.3.1.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="{{asset('public/resources/client/js/popper.min.js')}}"></script>
	<script src="{{asset('public/resources/client/js/loader.js')}}"></script>
	<script src="{{asset('public/resources/client/js/main.js')}}"></script>
	<script src="{{asset('public/resources/client/js/cart.js')}}"></script>
	<script src="{{asset('public/resources/client/js/login.js')}}"></script>
	<script src="{{asset('public/resources/client/js/ajax.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.0.0-beta.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
        (function() {
        'use strict';
         window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
        $('.multi-item-carousel').carousel({
            interval: false
        });
        // for every slide in carousel, copy the next slide's item in the slide.
        // Do the same for the next, next item.
        $('.multi-item-carousel .item').each(function(){
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
            
            if (next.next().length>0) {
                next.next().children(':first-child').clone().appendTo($(this));
            } else {
                $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
</html>