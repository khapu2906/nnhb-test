@extends('admin.layout')

@section('title','New / Detail')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{$new['0']->name}} ({{$new['0']->slug}})</h3>
                </div>
                <div>
                    <h3>- Belongs of: @if(isset($new['0']->category_name)) {{$new['0']->category_name}} @else No category blog @endif  </h3>
                </div>
                <!-- form start -->
                <div class="card-body">
                    {!!$new['0']->content!!}
                </div>
</div>
@endsection