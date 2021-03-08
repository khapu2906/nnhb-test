@extends('client.layout')

@section('title','Thành công')
@section('content')
@parent

<hr id="space">

<div class="container-fulid  cart-list" id="cartSuccess" style="min-height: 550px;text-align:center;">
    <h1>Thanh toán thành công</h1>
    <h3>Cảm ơn bạn đã tin tưởng và lựa chọn HUS</h3>
    <h3>Mã đơn của bạn là: {{$code}}</h3>
    <a id="product_list_success_link" href="{{url('danh-sach-san-pham')}}">Tiếp tục mua hàng</a>
</div>
<hr id="space">
@endsection