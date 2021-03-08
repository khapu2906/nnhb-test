@extends('admin.layout')

@section('title','Banner / Edit')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit banner</h3>
                </div>
                <!-- form start -->
                @include('admin.error')
                <form action="" method="post" >
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" onkeyup="ChangeToSlug();" placeholder="Enter name" value="{{$banner->name}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug" value="{{$banner->slug}}">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">File input</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm_thumbnail" data-input="thumbnail" data-preview="holder" class="btn btn-info">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="image" value="{{$banner->image}}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$banner->image}}">
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea id="my-editor" name="note" id="note" class="form-control">{!! $banner->note !!}</textarea>
                    </div>
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" name="display" id="customSwitch1" value="1" <?php if($banner->display == 1) echo 'checked' ?>>
                      <label class="custom-control-label"  for="customSwitch1">Toggle if you want this video to be displayed</label>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
</div>
@endsection