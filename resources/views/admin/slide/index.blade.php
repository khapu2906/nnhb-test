@extends('admin.layout')

@section('title','Slide')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Slide</h3>
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
                    <th>NOTE</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($slide_list as $slide)
                  <tr>
                    <td>{{$slide['id']}}</td>
                    <td>{{$slide['name']}}</td>
                    <td>{{$slide['slug']}}</td>
                    <td><img width="300" src="{{$slide['image']}}" /></td>
                    <td>{!!$slide['note']!!}</td>
                    <td><a href="{{url('admin/slide-edit')}}/{{$slide['id']}}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{url('admin/slide-delete')}}/{{$slide['id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                  </tr>
                @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th>IMAGE</th>
                    <th>NOTE</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$slide_list->links()}}
                <div class="card-footer">
                  <a href="{{url('admin/slide-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
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