
@extends('client.layout')

@section('title','Nhà phân phối')
@section('content')
@parent
<div class="container-fulid head-index" >
    <hr id="space">
    
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / Nhà phân phối
        </p>
    </div>
    <div><h3 class="title-new">DANH SÁCH NHÀ PHÂN PHÔI</h3></div>
    <hr>
</div>
	<hr id="space">
	<div class="container-fulid display-list" style="min-height: 450px;">
		<div class="row" style="width:70%;margin-left:15%">
        <table id="example1" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th style="font-size: 12px;">STT</th>
													<th style="font-size: 12px;">Tên nhà phân phối</th>
													<th style="font-size: 12px;">Số điện thoại</th>
													<th style="font-size: 12px;">Địa chỉ</th>
												</tr>
											</thead>
											<tbody id="list">
													@php $i=1 @endphp
													@foreach($agency_list as $agency)	
													<tr>
														<td>{{$i}}</td>
														<td>{{$agency->name}}</td>
														<td>{{$agency->phone}}</td>
														<td>{{$agency->place}}</td>
														@php $i++ @endphp
													</tr>
													@endforeach
											</tbody>
											<tfoot>
												<tr>
                                                <th style="font-size: 12px;">STT</th>
													<th style="font-size: 12px;">Tên nhà phân phối</th>
													<th style="font-size: 12px;">Số điện thoại</th>
													<th style="font-size: 12px;">Địa chỉ</th>
												</tr>
											</tfoot>
										
                    </table>
			
		</div>    
		{{$agency_list->links()}}
	</div>
	<hr id="space">
@endsection