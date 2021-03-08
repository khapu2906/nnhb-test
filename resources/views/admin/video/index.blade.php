@extends('admin.layout')

@section('title','Video')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Video</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>VIDEO</th>
                    <th>DISPLAY REGIME</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($video_list as $video)
                  <tr>
                    <td>{{$video['id']}}</td>
                    <td>{{$video['name']}}</td>
                    <td><iframe src="https://www.youtube.com/{{$video['content']}}" class="video" width="250" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                    <td>
                    <div class="custom-control custom-switch">
                      <form>
                        @csrf
                        <input type="checkbox" value="{{$video->display}}" name="display" url="{!!url('admin/video-display/')!!}"  class="custom-control-input" id="display-{{$video->id}}" onchange=" changeDisplay({{$video->id}})" <?php if($video->display == 1) echo 'checked' ?>>
                        <label class="custom-control-label"   for="display-{{$video->id}}">Toggle if you want this video to be displayed</label>
                      </form>
                      </div>
                    </td>
                    <td><a href="{{url('admin/video-edit')}}/{{$video['id']}}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{url('admin/video-delete')}}/{{$video['id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                  </tr>
                @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>NAME</th>
                    <th>VIDEO</th>
                    <th>DISPLAY REGIME</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$video_list->links()}}
                <div class="card-footer">
                  <a href="{{url('admin/video-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
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