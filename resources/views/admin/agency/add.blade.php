@extends('admin.layout')

@section('title','Agency / Add')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add agency</h3>
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
                                                <input type="text" class="form-control" name="name" id="cusName" placeholder="Enter name" value="">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                                <label for="cusPhone">Phone</label>
                                                <input type="number"  maxlength="11" minlength="9" class="form-control" name="phone" id="cusPhone" placeholder="Enter phone" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cusEmail">Email</label>
                                        <input type="text" class="form-control" name="email" id="cusEmail" placeholder="Enter Email" value="">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#place">Place</label>
                                            <input type="text" id="place" name="place"  class="form-control"  value="">
                                        </div>
                                        <div class="form-group col-xs-2 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#city">T???nh </label>
                                            <select id="city"  class="form-control" url="{{url('district')}}" search>
                                                <option>--Ch???n T???nh--</option>
                                                @foreach($citys as $ci)
                                                    <option id="valueCity-{{$ci->id}}" value="{{$ci->id}}">{{$ci->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#district">Qu???n huy???n</label>
                                            <select id="district"   class="form-control" url="{{url('ward')}}">
                                            <option>--Ch???n Qu???n--</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#ward">X??, Ph?????ng </label>
                                            <select id="ward"   class="form-control">
                                            <option>--Ch???n Ph?????ng X??--</option>
                                            </select>
                                        </div>
                                    </div>    
                                    <div class="form-group">
                                        <label for="cusNote">Note</label>
                                        <textarea id="cusNote"  name="note" style="width:100%"  class="form-control" rows="3" placeholder="Enter note" >
                                        </textarea>
                                    </div>
                                    <input type="hidden" name="city" id="cityInput" value=''>
                                    <input type="hidden" name="ward" id="wardInput" value=''>
                                    <input type="hidden" name="district" id="districtInput" value=''>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="Sumit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
</div>

@endsection