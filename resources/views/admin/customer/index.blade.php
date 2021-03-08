@extends('admin.layout')

@section('title','Customer')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Customer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="" method="get" url="{!!url('admin/customer')!!}" id="formCus">
                  <div class="form-group row">
                    <div class="col-sm-2">
                      <input type="text" id="cusKey"   name="key" class="form-control" value=""  placeholder="Enter code....">
                    </div>
                    <div class="col-md-2" id="">
                      <select class="form-control" id="cusType" name="type" >
                        <option value="name"  style="background-color: white;color:black">Name</option>
                        <option value="phone"  style="background-color: white;color:black">Phone</option>
                      </select>
                    </div>
                    <div class="col-sm-2"> 
                      <button type="button"  class="btn btn-info" onclick="redirectCustomer()"><i class="fas fa-search"></i></button>
                      <a href="{{route('admin.customer')}}"><button type="button"  class="btn btn-info">Back</button></a>
                    </div>
                  </div>
                </form> 
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>BIRTH ĐAY</th>
                    <th>PHONE</th>
                    <th>EMAIL</th>
                    <th>PLACE</th>
                    <th>NOTE</th>
                    <th>ORDER</th>
                    <th>USER</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
              @if(!empty($customer_list))
                @foreach($customer_list as $customer)
                  <tr>
                    <td>{{$customer['id']}}</td>
                    <td>{{$customer['name']}}</td>
                    <td>{{$customer['birthday']}}</td>
                    <td>{{$customer['phone']}}</td>
                    <td>{{$customer['email']}}</td>
                    <td>{{$customer['place']}}</td>
                    <td>{{$customer['note']}}</td>
                    <td>{{$customer['orders']}}</td>
                    <td>{{$customer['username']}}</br></td>
                    <td><a href="{{url('admin/customer-edit')}}/{{$customer['id']}}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{url('admin/customer-delete')}}/{{$customer['id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                  </tr>
                @endforeach  
              @else
                  <tr ></tr>
               @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>BIRTH ĐAY</th>
                    <th>PHONE</th>
                    <th>EMAIL</th>
                    <th>PLACE</th>
                    <th>NOTE</th>
                    <th>ORDER</th>
                    <th>USER</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$customer_list->links()}}
                <div class="card-footer">
                  <a href="{{url('admin/customer-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
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


@endsection