@extends('client.layout')

@section('title', $site['name'])
@section('content')
@parent

  <!-- typical saller -->
  <hr id="space">
<div class="container-fulid head-index" >
    <div id="title-link">
        <p>
            <a  href="">Trang chủ</a> / {{$site['name']}}
          
        </p>
    </div>
    <div style=""><h3 class="title-new"> {{$site['name']}}  </h3></div>
</div>
<hr id="space">
<hr>
<div class="container-fulid  display-list" style="min-height: 550px;">
{!!$site['content']!!}
</div>
<hr id="space">
@endsection