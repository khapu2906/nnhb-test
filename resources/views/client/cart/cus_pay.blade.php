@extends('client.layout')

@section('title','Thanh Toán')
@section('content')
@parent

<hr id="space">
<div class="container-fulid head-index" >
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / Thanh toán
           
        </p>
    </div>
    <div style=""><h3 class="title-new"> THANH TOÁN</h3></div>
</div>
<hr id="space">
<hr>
<div class="container-fulid  cart-list" id="cartList" style="min-height: 550px;">
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
<form action="{{route('pay.add')}}" method="post">
    @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-9">
                    <div class="row">
                        
                        <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label for="#name">Tên Khách Hàng</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$cus_name}}">
                        </div>
                        <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <label for="#email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"  value="{{$cus_email}}">
                        </div>
                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="#phone">Số điện thoại</label>
                            <input type="number" id="phone" name="phone" minlength="9" maxlength="11" class="form-control"  value="{{$cus_phone}}">
                        </div>
                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="#birthday">Sinh nhật</label>
                            <input type="date" id="birthday" name="birthday" minlength="9" maxlength="11" class="form-control"  value="{{$cus_birthday}}">
                        </div>
                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <label for="#place">Địa chỉ</label>
                            <input type="text" id="place" name="place"  class="form-control"  value="{{$place}}">
                        </div>
                        <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label for="#city">Tỉnh </label>
                            <select id="city"  class="form-control" url="{{url('district')}}" search>
                                <option>@if($city==NULL)--Chọn Tỉnh--@else {{$city}} @endif</option>
                                @foreach($citys as $ci)
                                    <option id="valueCity-{{$ci->id}}" value="{{$ci->id}}">{{$ci->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label for="#district">Quận huyện</label>
                            <select id="district"   class="form-control" url="{{url('ward')}}">
                            <option>@if($district==NULL)--Chọn Quận--@else {{$district}} @endif</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label for="#ward">Xã, Phường </label>
                            <select id="ward"   class="form-control">
                            <option>@if($ward==NULL)--Chọn Phường Xã--@else {{$ward}} @endif</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="#note">Chú thích</label>
                            <textarea class="form-control" id="note" name="note" style="min-height: 200px;" >{{$cus_note}}</textarea>
                        </div>
                    </div>    
                </div>
                <input type="hidden" name="city" id="cityInput" value='{{$city}}'>
                <input type="hidden" name="ward" id="wardInput" value='{{$ward}}'>
                <input type="hidden" name="district" id="districtInput" value='{{$district}}'>
                <input type="hidden" name="detail" id="detail" value=''>
                <input type="hidden" name="total" id="total" value=''>
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-3" style="border-left:1px solid" >
                    <div class="cart-title">
                        <h4>Tất cả sản phẩm trong giỏ</h4>
                    </div>
                    <div class="cart-title">
                        <p>Số sản phẩm trong giỏ là:<span id="numberProduct"></span></p>
                    </div>
                    <div id="cartPay">
                    </div>
                    <div id="TOTAL" style="text-align:right">
                    </div>
                    <hr>
                </div>    
        
    </div>    
    <div>
       <h5>Phương thức thanh toán: thanh toán trực tiếp</h5>
    </div>
    <div>
        <button class="btn" id="pay" style="width:20%">Thanh toán</button>
    </div>
</form>
</div>
<hr id="space">
@endsection