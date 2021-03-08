@extends('admin.layout')

@section('title','Bill')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Bill table</h3>
              </div>
              @include('admin.errorajax')
              @include('admin.error')
              <!-- /.card-header -->
              
              <div class="card-body">
              <form action=""  id="formBillindex" url="{!!url('admin/bill')!!}">
                  <div class="form-group row">
                    <div class="col-sm-2">
                      <input type="text"id="billCode"   name="code" class="form-control" value="{{$code}}"  placeholder="Enter code....">
                    </div>
                    <div class="col-md-2">
                      <select class="form-control" id="billStatus" name="status">
                        @php
                              if($status == '0'){
                                echo '<option style="background-color: red;color:white" value="0" >New Order</option>';
                              }elseif($status == '1'){
                                echo '<option value="1" style="background-color: red;color:white" >Checked</option>';
                              }elseif($status == '2'){
                                echo '<option value="2" style="background-color: red;color:white">Delivered</option>';
                              }elseif($status == '3'){
                                echo '<option value="3" style="background-color: red;color:white">Success</option>';
                              }elseif($status == '4'){
                                echo '<option value="4" style="background-color: red;color:white">Cancel</option>';
                              }else{
                                echo ' <option value="" >Status</option>';
                              }
                            @endphp
                        <option value="0" style="background-color: white;color:black">New Order</option>
                        <option value="1"  style="background-color: white;color:black">Checked</option>
                        <option value="2"  style="background-color: white;color:black">Delivered</option>
                        <option value="3"  style="background-color: white;color:black">Success</option>
                        <option value="4"  style="background-color: white;color:black">Cancel</option>
                      </select>
                    </div>
                    <div class="col-md-2" id="">
                      <select class="form-control" id="billType" name="type" >
                          @php
                              if($type == '0'){
                                echo '<option value="0" style="background-color: red;color:white"  >Offline</option>';
                              }elseif($type == '1'){
                                echo '<option value="1" style="background-color: red;color:white">Social media</option>';
                              }elseif($type == '2'){
                                echo '<option value="2"style="background-color: red;color:white" >Web</option>';
                              }else{
                                echo ' <option value="">Type</option>';
                              }
                            @endphp
                        <option value="0" style="background-color: white;color:black">Offine</option>
                        <option value="1"  style="background-color: white;color:black">Social Media</option>
                        <option value="2"  style="background-color: white;color:black">Web</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <input type="date" id="billDate" name="time" class="form-control" value="{{$date}}">
                    </div>
                    <div class="col-sm-2"> 
                      <button type="button" onclick="redirectBill()"  class="btn btn-info"><i class="fas fa-search"></i></button>
                      <a href="{{route('admin.bill')}}"><button type="button"  class="btn btn-info">Back</button></a>
                    </div>
                    </form>  
                  </div>
                <br/>
                <div>
                  @include('admin.bill.bill')
                </div>
                <div class="card-footer" >
                  <div style="float:right">
                    <h5><span style="color:red" for="total">Total: </span>  {{number_format($revenue_total)}} VNĐ</h5>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="{{url('admin/bill-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <div class="modal fade" id="detailorder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
              <h4 class="modal-title w-100" id="myModalLabel">Detail order</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!--Body-->
            <div class="modal-body" >
            <div class="card-body"  id="detailData">
             
            </div>
            <!--Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        <!--/.Content-->
      </div>
    </div>

@endsection