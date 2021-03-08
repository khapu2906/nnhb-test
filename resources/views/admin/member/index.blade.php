@extends('admin.layout')

@section('title','Member')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>ACCOUNT NAME</th>
                    <th>EMAIL</th>
                    <th>OWN CUSTOMER</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody >
              @if(!empty($member_list))
                @foreach($member_list as $member)
                  <tr>
                    <td>{{$member['id']}}</td>
                    <td>{{$member['accountname']}}</td>
                    <td>{{$member['email']}}</td>
                    <td> <button type="button" class="btn btn-info" url="{!!url('admin/member-detail')!!}" id="buttoncustomer-{{$member->id}}" url="{!!url('admin/member-detail')!!}" onclick="detailCustomer({{$member->id}})" data-toggle="modal" data-target="#detailorder">
                        Detail
                      </button></td>
                    <td> <div class="custom-control custom-switch">
                      <form>
                        @csrf
                        <input type="checkbox" name="status" url="{!!url('admin/member-status/')!!}" value="{{$member->status}}" class="custom-control-input" id="status-{{$member->id}}" onchange=" changeStatus({{$member->id}})" <?php if($member->status == 1) echo 'checked' ?>>
                        <label class="custom-control-label"   for="status-{{$member->id}}">Toggle if member shut down</label>
                      </form>
                      </div>
                    </td>
                    <td><a href="{{url('admin/member-edit')}}/{{$member['id']}}"><i class="fas fa-edit"></i></a></td></td>
                  </tr>
                @endforeach  
               @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>ACCOUNT NAME</th>
                    <th>EMAIL</th>
                    <th>OWN CUSTOMER</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$member_list->links()}}
              
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