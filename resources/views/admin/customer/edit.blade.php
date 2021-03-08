@extends('admin.layout')

@section('title','Customer / Edit')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit customer</h3>
                </div>
                <!-- form start -->
                @include('admin.error')
                <form  method="post" id="cusForm" action="" >
                                    @csrf
                                    <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                                <label for="cusName">Name</label>
                                                <input type="text" class="form-control" name="name" id="cusName" placeholder="Enter name" value="{{$customer->name}}">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                                <label for="cusPhone">Phone</label>
                                                <input type="number"  maxlength="11" minlength="9" class="form-control" name="phone" id="cusPhone" placeholder="Enter phone" value="{{$customer->phone}}">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                                <label for="cusBirthday">Birthday</label>
                                                <input type="date" class="form-control" name="birthday" id="cusBirthday" value="{{$customer->birthday}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cusEmail">Email</label>
                                        <input type="text" class="form-control" name="email" id="cusEmail" placeholder="Enter Email" value="{{$customer->email}}">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#place">Địa chỉ</label>
                                            <input type="text" id="place" name="place"  class="form-control"  value="{{$place}}">
                                        </div>
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#city">Tỉnh </label>
                                            <select id="city"  class="form-control" url="{{url('district')}}" search>
                                                <option>@if($city==NULL)--Chọn Tỉnh--@else {{$city}} @endif</option>
                                                @foreach($citys as $ci)
                                                    <option id="valueCity-{{$ci->id}}" value="{{$ci->id}}">{{$ci->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#district">Quận huyện</label>
                                            <select id="district"   class="form-control" url="{{url('ward')}}">
                                            <option>@if($district==NULL)--Chọn Quận--@else {{$district}} @endif</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#ward">Xã, Phường </label>
                                            <select id="ward"   class="form-control">
                                            <option>@if($ward==NULL)--Chọn Phường Xã--@else {{$ward}} @endif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cusNote">Note</label>
                                        <textarea id="cusNote"  name="note" style="width:100%"  class="form-control" rows="3" placeholder="Enter note" >
                                            {{$customer->note}}
                                        </textarea>
                                    </div>
                                    <input type="hidden" name="city" id="cityInput" value='{{$city}}'>
                                    <input type="hidden" name="ward" id="wardInput" value='{{$ward}}'>
                                    <input type="hidden" name="district" id="districtInput" value='{{$district}}'>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="Sumit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
</div>

@endsection