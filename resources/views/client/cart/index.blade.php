@extends('client.layout')

@section('title','Giỏ hàng')
@section('content')
@parent

<hr id="space">
<div class="container-fulid head-index" >
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / Giỏ hảng
           
        </p>
    </div>
    <div style=""><h3 class="title-new"> GIỎ HÀNG</h3></div>
</div>
<hr id="space">
<hr>
<div class="container-fulid  cart-list" id="cartList" style="min-height: 450px;">
    <div class="cart-title">
        <h4>Tất cả sản phẩm trong giỏ</h4>
    </div>
    <div class="cart-title">
        <p>Số sản phẩm trong giỏ là:<span id="numberProduct"></span></p>
    </div>
    <div id="cartBodyFull">

    </div>
    <div id="TOTAL" style="text-align:right">

    </div>
    <hr>
    <div>
        <a href="{{url('thanh-toan')}}"><button class="btn" id="pay" style="width:20%">Thanh toán</button></a>
    </div>

</div>
<hr id="space">
@endsection