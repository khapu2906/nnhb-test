@extends('admin.layout')

@section('title','Menu')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Menu</h3>
              </div>
              <!-- /.card-header -->
              @include('admin.error')
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th>LEVEL</th>
                    <th>CHILDS</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
              @if(!empty($menu_list))
                @foreach($menu_list as $menu)
                  <tr>
                    <td>{!!$menu['name']!!}</td>
                    <td>{{$menu['slug']}}</td>
                    <td>{{$menu['level']}}</td>
                    <td>
                      <div  class="row">
                        <div class="col-lg-2 col-md-2">
                          {{$menu['amount_childs']}}
                        </div>
                        <div class="col-lg-10 col-md-10">
                            <button style="width:20%;align-items: center;" type="button" onclick="formAddCate('{{$menu->name}}',{{$menu->id}})" class="btn btn-info" data-toggle="modal" data-target="#formCateNew"><i class="fas fa-plus-square"></i></button>
                        </div>
                      </div>  
                    </td>
                    <td><a href="{{url('admin/menu-edit')}}/{{$menu['id']}}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{url('admin/menu-delete')}}/{{$menu['id']}}/{{$menu['parent_id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                  </tr>
                @endforeach  
              @else
                  <tr ></tr>
               @endif
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th>LEVEL</th>
                    <th>CHILDS</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
              </div>
                <div class="card-footer">
                  <button type="button" style="width:20%;align-items: center;" onclick="formAddCate('Base',0)" class="btn btn-info" data-toggle="modal" data-target="#formCateNew" >Add</button>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <div class="modal fade" id="formCateNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
              <h4 class="modal-title w-100" id="myModalLabel">Form Menu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <!--Body-->
            <div class="modal-body" >
             @include('admin.menu.add')
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