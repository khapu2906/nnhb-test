@extends('admin.layout')

@section('title','Category Product / Edit')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit category product</h3>
                </div>
                <!-- form start -->
                @include('admin.error')
                <form  method="post"  action="" >
                                    @csrf
                                    <div class="card-body">
                                    <h4 id="parentName"></h4>

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" onkeyup="ChangeToSlug()" placeholder="Enter Name" value="{{$category->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" name="slug" id="slug"  placeholder="" value="{{$category->slug}}">
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" id="addFrCustomer" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
</div>

@endsection