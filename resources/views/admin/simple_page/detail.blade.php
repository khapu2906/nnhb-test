@extends('admin.layout')

@section('title','Video / Detail')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{$simple_page->name}} ({{$simple_page->slug}})</h3>
                </div>
                <!-- form start -->
                <div class="card-body">
                    {!!$simple_page->content!!}
                </div>
</div>
@endsection