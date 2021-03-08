@extends('admin.layout')

@section('title','Vip Customer')
@section('content')
@parent
<div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Vip Customer </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form action="" method="get">
                
                  <div class="form-group row">
                    <div class="col-sm-2">
                      <input type="month"   name="date" class="form-control" value="{{$date}}" >
                    </div>
                    <div class="col-sm-2"> 
                      <button type="submit"  class="btn btn-info"><i class="fas fa-search"></i></button>
                      <a href="{{route('admin.vip.customer')}}"><button type="button"  class="btn btn-info">Back</button></a>
                    </div>
                  </div>
                </form> 
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>PHONE</th>
                      <th>ORDERS</th>
                    </tr>
                    </thead>
                    <tbody>
                @if(!empty($customer_list))
                  @foreach($customer_list as $customer)
                    <tr>
                    <td>{{$customer['id']}}</td>
                    <td>{{$customer['name']}}</td>
                    <td>{{$customer['phone']}}</td>
                      <td>{{$customer['orders']}}</td>
                    </tr>
                  @endforeach  
                @endif 
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>PHONE</th>
                      <th>ORDERS</th>
                    </tr>
                    </tfoot>
                  </table> 
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