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
                    <div class="card-body">
                        <label for="aim">Aim of {!!date('m / Y',strtotime($kpi->time))!!}</label>
                        <div class="input-group">
                            <input type="number" class="form-control" min="0" name="aim" id="aim" value="{{$kpi->aim}}" placeholder="Enter aim">
                            <div class="input-group-append">
                                <span class="input-group-text">VNĐ</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
</div>
@endsection