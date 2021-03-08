@extends('admin.layout')

@section('title','Bill / Edit')
@section('content')
@parent
<div class="card card-info" id="formBill">
                <div class="card-header">
                    <h3 class="card-title">Edit bill</h3>
                </div>
                <!-- form start -->
                @include('admin.error')
                <form id="frAddBill" url="{!!url('admin/bill-add')!!}" method="post" >
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">CODE</label>
                            <input type="text" minlength="1" min="1" class="form-control" name="code" id="code"  placeholder="Enter name" value="{{$bill->code}}">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                @if($bill->type == 0)
                                    <option value="0" style="background-color: red;color:white"  >Offline</option>
                                @elseif($bill->type == 1)
                                    <option value="1" style="background-color: red;color:white">Social Media</option>
                                @else
                                    <option value="2" style="background-color: red;color:white">Web</option>
                                @endif    
                                <option value="0">Offline</option>
                                <option value="1">Social Media</option>
                                <option value="2">Web</option>
                            </select>
                        </div>
                        <script>
                        </script>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea id="note"  name="note" style="width:100%"  class="form-control" rows="3" placeholder="Enter note" >{{$bill->note}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="url-customer" value="{!!url('admin/bill-choose-product')!!}">
                            <label for="addCustomer">Customer </label>
                            <button type="button" class="btn btn-info" id="addCustomer" data-toggle="modal" data-target="#customerform">Add Customer</button>
                            <button type="button" class="btn btn-info"  onclick="drawCheckoutCus()" ><i class="fas fa-sync-alt"></i></button>
                            <label></label>
                            
                        </div>
                            <input type="hidden" name="customer" id="idCustomer" value="{{'['.$bill->customer.']'}}">
                            <input type="hidden" name="detail" id="detail" value="{{$bill->detail}}">
                            <input type="hidden" name="total" id="total" value="{{$bill->total}}">
                            <input type="hidden" name="total_sale" id="total_sale" value="{{$bill->total_sale}}">
                            <label>Customer</label>
                            <table  class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>phone</th>
                                        <th>birthday</th>
                                        <th>place</th>
                                        <th>email</th>
                                    </tr>
                                </thead>
                                <tbody id="cusData">
                                </tbody>
                            </table>
                            <hr/>
                        <div class="form-group">
                            <input type="hidden" id="url-product" value="{!!url('admin/product-choose-product')!!}">
                            <label for="chooseProduct">Product </label>
                            <button type="button" class="btn btn-info" id="chooseProduct" data-toggle="modal" data-target="#producttable">Choose Product</button>
                            <button type="button" class="btn btn-info"  onclick="drawCheckout()" ><i class="fas fa-sync-alt"></i></button>
                        </div>
                        <label>Cart</label>
                            <div class="input-group mb-3">
                                <input type="number"  min="0" max="100" class="form-control" name="rate_sale" id="rateSale" onkeyup="changeRateSale()" value="{{$bill->rate_sale}}"  placeholder="Enter rate sale">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                            <table  class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>index</th>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>image</th>
                                        <th>price</th>
                                        <th>encourage price</th>
                                        <th>quantum</th>
                                        <th>total</th>
                                    </tr>
                                </thead>
                                <tbody id="cartData">
                                
                                </tbody>
                                <td colspan="8" ><div style="float:right" id="TOTAL"><h5><span style="color:red" for="total">Total: </span>{{$bill->total}} VNĐ</h5></div>
                            </table>
                            <hr>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit"  class="btn btn-info"  onclick="addBill()">Submit</button>
                    </div>
                </form>
                @include('admin.bill.product.layout-product')
                @include('admin.bill.customer.layout')
</div>

@endsection