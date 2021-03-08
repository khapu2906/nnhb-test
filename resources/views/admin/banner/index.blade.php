@extends('admin.layout')

@section('title','Banner')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Banner</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th>IMAGE</th>
                    <th>DISPLAY</th>
                    <th>NOTE</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($banner_list as $banner)
                  <tr>
                    <td>{{$banner['id']}}</td>
                    <td>{{$banner['name']}}</td>
                    <td>{{$banner['slug']}}</td>
                    <td><img width="300" src="{{$banner['image']}}" /></td>
                    <td>
                    <div class="custom-control custom-switch">
                      <form>
                        @csrf
                        <input type="checkbox" name="display" value="{{$banner->display}}" url="{!!url('admin/banner-display/')!!}"  class="custom-control-input" id="display-{{$banner->id}}" onchange=" changeDisplay({{$banner->id}})" <?php if($banner->display == 1) echo 'checked' ?>>
                        <label class="custom-control-label"   for="display-{{$banner->id}}">Toggle if you want this banner to be displayed</label>
                      </form>
                      </div>
                    </td>
                    <td>{!!$banner['note']!!}</td>
                    <td><a href="{{url('admin/banner-edit')}}/{{$banner['id']}}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{url('admin/banner-delete')}}/{{$banner['id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                  </tr>
                @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th>IMAGE</th>
                    <th>DISPLAY</th>
                    <th>NOTE</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$banner_list->links()}}
                <div class="card-footer">
                  <a href="{{url('admin/banner-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
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