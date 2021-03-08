@extends('admin.layout')

@section('title','Simple Page')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Simple Page</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th>CONTENT</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($simple_page_list as $simple_page)
                  <tr>
                    <td>{{$simple_page['id']}}</td>
                    <td>{{$simple_page['name']}}</td>
                    <td>{{$simple_page['slug']}}</td>
                    <td><a href="{{url('admin/simple-page-detail')}}/{{$simple_page['id']}}">Detail</a></td>
                    <td><a href="{{url('admin/simple-page-edit')}}/{{$simple_page['id']}}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{url('admin/simple-page-delete')}}/{{$simple_page['id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                  </tr>
                @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>SLUG</th>
                    <th>CONTENT</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$simple_page_list->links()}}
                <div class="card-footer">
                  <a href="{{url('admin/simple-page-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
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