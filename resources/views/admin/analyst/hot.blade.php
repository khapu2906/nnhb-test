@extends('admin.layout')

@section('title','Hot')
@section('content')
@parent
<div class="container-fluid">
  <h1 style="color:red">The method don't support with this version</h1>
          <div class="row">
            <div class="col-6">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Hot Product</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>POINT</th>
                    </tr>
                    </thead>
                    <tbody>
                @if(isset($banner_list))
                  @foreach($banner_list as $banner)
                    <tr>
                      <td>{{$banner['id']}}</td>
                    </tr>
                  @endforeach  
                @endif 
                    </tbody>
                    <tfoot>
                   <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>POINT</th>
                    </tr>
                    </tfoot>
                  </table> 
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <div class="col-6">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Hot New</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>POINT</th>
                    </tr>
                    </thead>
                    <tbody>
                @if(isset($banner_list))
                  @foreach($banner_list as $banner)
                    <tr>
                      <td>{{$banner['id']}}</td>
                    </tr>
                  @endforeach  
                @endif 
                    </tbody>
                    <tfoot>
                   <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>POINT</th>
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