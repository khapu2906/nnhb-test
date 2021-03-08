@extends('admin.layout')

@section('title','Slide / Edit')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit slide</h3>
                </div>
                <!-- form start -->
                @include('admin.error')
                <form action="" method="post" >
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" onkeyup="ChangeToSlug();" placeholder="Enter name" value="{{$slide->name}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug" value="{{$slide->slug}}">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">File input</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm_thumbnail" data-input="thumbnail" data-preview="holder" class="btn btn-info">
                                <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="image" value="{{$slide->image}}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;" src="{{$slide->image}}">
                    </div>
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea id="my-editor" name="note"  class="form-control">{!! $slide->note !!}</textarea>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
</div>
@endsection