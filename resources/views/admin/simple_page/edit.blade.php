@extends('admin.layout')

@section('title','Simple Page / Edit')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit simple_page</h3>
                </div>
                <!-- form start -->
                @include('admin.error')
                <form action="" method="post" >
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" onkeyup="ChangeToSlug();" placeholder="Enter name" value="{{$simple_page->name}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug" value="{{$simple_page->slug}}">
                    </div>
                    <div class="form-gorup ">
                        <label for="content">Content</label>
                        <textarea id="my-editor" name="content" id="content" class="form-control">{!! $simple_page->content !!}</textarea>
                        
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
</div>
@endsection