@extends('client.layout')

@section('title','Tài khoản')
@section('content')
@parent

<hr id="space">
<div class="container-fulid head-index" >
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / Tài khoản
           
        </p>
    </div>
    <div style=""><h3 class="title-new"> TÀI KHOẢN</h3></div>
</div>
<hr id="space">
<hr>
<div class="container-fulid  cart-list" id="cartList" style="min-height: 700px;background:url({{asset('public/resources/admin/image/background.jpg')}})">
            <div class="row">
                <div  class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="background:#ffffffd1;min-height: 700px">
                <div id="errorpass">
                @if ($errors->any())
                        <div>
                            <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                @foreach ($errors->all() as $error)
                                        <strong>{{$error}}</strong> <br>
                                @endforeach
                            </div>
                         </div>
                    @endif
                </div>
                    <hr id="space">
                <div style="text-align:center"><h3>Đăng nhập   </h3></div>
                <hr>
                <form method="post" action="{{route('login')}}">
                    <div class="row ">
                            @csrf
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="#email">Email</label>
                                <input type=mail id="email" name="email" class="form-control" value="">
                            </div>
                            <hr id="space">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="#password">Mật khẩu</label>
                                <input type="password" id="password" name="password" minlength="8"  class="form-control"  value="">
                            </div>
                            <hr>
                            
                            <div  class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <button class="btn" style="width:50%;background:#4a552a;color:white" >Đăng nhập</button>
                            </div> 
                          
                    </div>    
                </form>   
                <hr>
                <div style="text-align:center"><h3>Tạo tài khoản mới  </h3></div>
                <hr>
                <form method="post" action="{{route('member.register')}}" onsubmit="return validate()">
                    <div class="row ">
                            @csrf
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="#name">Họ và Tên</label>
                                <input type="text" id="name" name="name" class="form-control" value="">
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="#phone">Số điện thoại</label>
                                <input type="number" id="phone" name="phone" class="form-control" value="">
                            </div>
                            <hr id="space">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="#email">Email</label>
                                <input type="mail" id="email" name="email" class="form-control" value="">
                            </div>
                            <hr id="space">
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="memPass">Mật khẩu</label>
                                <input type="password" id="memPass" name="password" minlength="8"  class="form-control"  value="">
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="#memAcPass">Xác nhận mật khẩu</label>
                                <input type="password" id="memAcPass" name="repassword" minlength="8"  class="form-control"  value="">
                            </div>
                            <hr>
                            <div  class="form-group col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <button class="btn" style="width:50%;background:#4a552a;color:white">Tạo tài khoản</button>
                            </div> 
                    </div>    
                </form>   
                </div>
            </div>    
    </div>    
</div>
<hr id="space">
@endsection