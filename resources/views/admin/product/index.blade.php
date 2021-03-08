@extends('admin.layout')

@section('title','Product')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Product</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="get"id="formPro" url="{!!url('admin/product')!!}" >
                  <div class="form-group row">
                    <div class="col-sm-2">
                      <input type="text" id="proKey"  name="key" class="form-control" value=""  placeholder="Enter code....">
                    </div>
                    <div class="col-md-2" id="">
                      <select class="form-control" id="proType" name="type" >
                        <option value="id_search" style="background-color: white;color:black">Id</option>
                        <option value="name"  style="background-color: white;color:black">Name</option>
                      </select>
                    </div>
                    <div class="col-sm-2"> 
                      <button type="button"  class="btn btn-info" onclick="redirectProduct()"><i class="fas fa-search"></i></button>
                      <a href="{{route('admin.product')}}"><button type="button"  class="btn btn-info">Back</button></a>
                    </div>
                  </div>
                </form>  
                <br/>
                <div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>SLUG</th>
                      <th>IMAGE</th>
                      <th>PRICE</th>
                      <th>ENCOURAGE PRICE</th>
                      <th>QUANTUM</th>
                      <th>CATEGORY</th>
                      <th colspan="2">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product_list as $product)
                      <tr>
                        <td>{{$product['id_search']}}</td>
                        <td>{{$product['name']}}</td>
                        <td>{{$product['slug']}}</td>
                        <td>
                          <img width="100" src="{{$product['image']}}" />
                      </td>
                        <td>{!!$product['price']!!}</td>
                        <td>{!!$product['encourage_price']!!}</td>
                        <td>{!!$product['quantum']!!}</td>
                        <td><input type="hidden" id="url-get" value="{!!url('admin/product-detail')!!}">
                          <button type="button" class="btn btn-info" id="buttondetail" onclick="detailProduct({{$product['id']}})" data-toggle="modal" data-target="#detailcategory">
                            Detail
                          </button></td>
                        <td><a href="{{url('admin/product-edit')}}/{{$product['id']}}"><i class="fas fa-edit"></i></a></td>
                        <td><a href="{{url('admin/product-delete')}}/{{$product['id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                      </tr>
                    @endforeach  
                    </tbody>
                    <tfoot>
                    <tr>
                    <th>ID</th>
                      <th>NAME</th>
                      <th>SLUG</th>
                      <th>IMAGE</th>
                      <th>PRICE</th>
                      <th>ENCOURAGE PRICE</th>
                      <th>QUANTUM</th>
                      <th>CATEGORY</th>
                      <th colspan="2">ACTION</th>
                    </tr>
                    </tfoot>
                  </table> 
                </div>
                {{$product_list->links()}}
                <div class="card-footer">
                  <a href="{{url('admin/product-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
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
      <div class="modal fade" id="detailcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
              <h4 class="modal-title w-100" id="myModalLabel">Detail category</h4>
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


@endsection