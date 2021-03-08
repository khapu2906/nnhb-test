@extends('admin.layout')

@section('title','Admin')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Admin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>ACCOUNT NAME</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody >
              @if(!empty($admin_list))
                @foreach($admin_list as $admin)
                  <tr>
                    <td>{{$admin['id']}}</td>
                    <td>{{$admin['accountname']}}</td>
                    <td>{{$admin['email']}}</td>
                    <td> <div class="custom-control custom-switch">
                      <form>
                        @csrf
                        <input type="checkbox" name="status" url="{!!url('admin/admin-status/')!!}" value="{{$admin->status}}" class="custom-control-input" id="status-{{$admin->id}}" onchange=" changeStatus({{$admin->id}})" <?php if($admin->status == 1) echo 'checked' ?>>
                        <label class="custom-control-label"   for="status-{{$admin->id}}">Toggle if admin shut down</label>
                      </form>
                      </div>
                    </td>
                    <td><a href="{{url('admin/admin-edit')}}/{{$admin['id']}}"><i class="fas fa-edit"></i></a></td></td>
                  </tr>
                @endforeach  
               @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>ACCOUNT NAME</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$admin_list->links()}}
                <div class="card-footer">
                  <a href="{{url('admin/admin-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
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
              <h4 class="modal-title w-100" id="myModalLabel">Detail </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!--Body-->
            <div class="modal-body" >
            <div class="card-body"  id="detailCustomer">
             
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