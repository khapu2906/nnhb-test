@extends('client.layout')

@section('title','Chọn thông tin liên hệ')
@section('content')
@parent

<hr id="space">
<div class="container-fulid head-index" >
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / Thanh toán
           
        </p>
    </div>
    <div style=""><h3 class="title-new">LỰA CHỌN THÔNG TIN KHÁCH HÀNG </h3></div>
</div>
<hr id="space">
<hr>
<div class="container-fulid  " style="min-height: 450px;text-align:center;">
<div class="row">
    @php $count = 0 @endphp
    @foreach($customer_list as $customer)
    @php $count +=1 @endphp
    <div class=" col-xs-12 col-sm-6 col-md-3 col-lg-3 " >
        <div class="info_customer" id="info_customer" onclick="payAuth({{$customer->id}})" url="{{url('thanh-toan')}}">
                <div>
                    <br>
                    <div>HỌ VÀ TÊN: <span>{{$customer->name}}</span></div>
                    <div>SINH NHẬT: <span>{{($customer->birthday!=null)?date('d/m/Y',strtotime($customer->birthday)):'Trống'}}</span></div>
                    <div>SĐT: <span>{{$customer->phone}}</span></div>
                    <div>EMAIL: <span>{{$customer->email}}</span></div>
                    <div>ĐỊA CHỈ: <span>{{$customer->place}}</span></div>
                </div>
        </div>    
    </div>    
    <hr id="space">
    @endforeach
    </div>    
   
</div>
<hr id="space">
@endsection