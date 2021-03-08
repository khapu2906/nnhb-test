@extends('admin.layout')

@section('title','Video / Add')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add video</h3>
                </div>
                <!-- form start -->
                @include('admin.error')
                <form action="" method="post" >
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" onkeyup="ChangeToSlug();" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" name="content" id="content" placeholder="Enter content">
                    </div>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" name="display" class="custom-control-input" id="customSwitch1" checked value="1">
                      <label class="custom-control-label"  for="customSwitch1" >Toggle if you want this video to be displayed</label>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
</div>

@endsection