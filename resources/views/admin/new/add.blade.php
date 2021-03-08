@extends('admin.layout')

@section('title','New / Add')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add New</h3>
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
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug">
                        </div>
                        <div class="form-group">
                            <label for="date">Time</label>
                            <input type="date" class="form-control" name="date" id="date" >
                        </div>
                        <div class="form-group">
                            <label for="category">Category New</label>
                            <select class="form-control " name="category_new_id" id="category" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option value="" style="background-color: white;color:black">--Choose Category--</option>
                            @if(!empty($category_new_list))
                                @foreach($category_new_list as $category)
                                    <option value="{{$category->id}}" style="background-color: white;color:black">{{$category->name}}</option>
                                @endforeach
                            @endif
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">File input</label>
                            <div class="input-group">
                                <span class="input-group-btn btn-info">
                                    <a id="lfm_thumbnail" data-input="thumbnail" data-preview="holder" class="btn btn-info">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="image">
                                </div>
                                <img id="holder" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            <label for="short_content">Short Content</label>
                            <textarea id="my-editor-1" id="content" name="short_content" class="form-control">{!! old('note', '') !!}</textarea>
                                <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

                            </textarea>
                            
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="my-editor" id="content" name="content" class="form-control">{!! old('note', '') !!}</textarea>
                            <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
</div>

@endsection