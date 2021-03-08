@extends('admin.layout')

@section('title','New')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">New</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="" method="get"id="formNew" url="{!!url('admin/new')!!}">
                  <div class="form-group row">
                    <div class="col-sm-2">
                      <input type="text" name="name"id="newKey" class="form-control" value=""  placeholder="Enter key....">
                    </div>
                    <div class="col-sm-2"> 
                      <button type="button"class="btn btn-info" onclick="redirectNew()"><i class="fas fa-search"></i></button>
                      <a href="{{route('admin.new')}}"><button type="button"  class="btn btn-info">Back</button></a>
                    </div>
                  </div>
                </form>  
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th>IMAGE</th>
                    <th> CATEGORY</th>
                    <th> SHORT CONTENT</th>
                    <th> DETAILT</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($new_list as $new)
                  <tr>
                    <td>{{$new['id']}}</td>
                    <td>{{$new['name']}}</td>
                    <td>{{$new['slug']}}</td>
                    <td><img width="100" src="{{$new['image']}}" /></td>
                    <td>{!!$new['category_name']!!}</td>
                    <td>{!!$new['short_content']!!}</td>
                    <td><a href="{{url('admin/new-detail')}}/{{$new['id']}}">Detail</a></td>
                    <td><a href="{{url('admin/new-edit')}}/{{$new['id']}}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{url('admin/new-delete')}}/{{$new['id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                  </tr>
                @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th> CATEGORY</th>
                    <th> SHORT CONTENT</th>
                    <th> DETAILT</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$new_list->links()}}
                <div class="card-footer">
                  <a href="{{url('admin/new-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
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