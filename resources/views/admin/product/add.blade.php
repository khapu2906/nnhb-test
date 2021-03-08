@extends('admin.layout')

@section('title','Product / Add')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add Product</h3>
                </div>
                <!-- form start -->
                @include('admin.error')
                <form action="" method="post" >
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-lg-2">
                                <label for="id_search">ID</label>
                                <input type="text" class="form-control" name="id_search" id="id_search"  placeholder="Enter id">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" onkeyup="ChangeToSlug();" placeholder="Enter name">
                            </div>
                            <div class="form-group col-lg-5">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" placeholder="Enter slug">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="price">Price</label>
                                <input type="number" min="0" class="form-control" name="price" id="price"  placeholder="Enter price">
                            </div>
                            <div class="form-group col-lg-4">
                            <label for="encouragePrice">Encourage Price</label>
                                <input type="number" min="0" class="form-control" name="encourage_price" id="encouragePrice"  placeholder="Enter encourage price">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="quantum">Quantum</label>
                                <input type="number" class="form-control" name="quantum" id="quantum" placeholder="Enter quantum">
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="category">Category Product</label>
                            <select class="form-control "  id="category" onchange="mutipleSelect()" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option style="background-color: white;color:black">--Choose Category--</option>
                            @if(!empty($category_product_list))
                                @foreach($category_product_list as $category)
                                    <option value="{{$category->id}}" id="categoryValue-{{$category->id}}" style="background-color: white;color:black">{{$category->name}}</option>
                                @endforeach
                            @endif
                          </select>
                          <input type="hidden" name="category_product_id" id="categorySelectedId" value="">
                          <div id="categorySelected"></div>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Image Primary</label>
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
                            <label for="thumbnail">Image More 1</label>
                            <div class="input-group">
                                <span class="input-group-btn btn-info">
                                    <a id="lfm_thumbnail_1" data-input="thumbnail_1" data-preview="holder_1" class="btn btn-info">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail_1" class="form-control" type="text" name="image_1">
                                </div>
                                <img id="holder_1" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Image More 2</label>
                            <div class="input-group">
                                <span class="input-group-btn btn-info">
                                    <a id="lfm_thumbnail_2" data-input="thumbnail_2" data-preview="holder_2" class="btn btn-info">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail_2" class="form-control" type="text" name="image_2">
                                </div>
                                <img id="holder_2" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Image More 3</label>
                            <div class="input-group">
                                <span class="input-group-btn btn-info">
                                    <a id="lfm_thumbnail_3" data-input="thumbnail_3" data-preview="holder_3" class="btn btn-info">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail_3" class="form-control" type="text" name="image_3">
                                </div>
                                <img id="holder_3" style="margin-top:15px;max-height:100px;">
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Image More 4</label>
                            <div class="input-group">
                                <span class="input-group-btn btn-info">
                                    <a id="lfm_thumbnail_4" data-input="thumbnail_4" data-preview="holder_4" class="btn btn-info">
                                    <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail_4" class="form-control" type="text" name="image_4">
                                </div>
                                <img id="holder_4" style="margin-top:15px;max-height:100px;">
                        </div>
                        
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea id="my-editor" id="content" name="note" class="form-control">{!! old('note', '') !!}</textarea>
                           
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
</div>

@endsection