@extends('admin.layout')

@section('title','Config')
@section('content')
@parent
<div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Config input</h3>
            </div>
            @include('admin.error')
            <form action="" method="post">
                @csrf
                 <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                        </div>
                        <input type="text" class="form-control" name="name" placeholder="name" value="">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="number" minlength="9" maxlength="11" name="phone" class="form-control" placeholder="phone" value="">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" name="mail" placeholder="mail" value="">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-clock"></i></span>
                        </div>
                        <input type="text" class="form-control" name="time" placeholder="time" value=""> 
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="place" placeholder="place" value="">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                        </div>
                        <input type="text" class="form-control" name="facebook" placeholder="facebook" value="">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                        </div>
                        <input type="text" class="form-control" name="instagram" placeholder="instagram" value="">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                        </div>
                        <input type="text" class="form-control" name="youtube" placeholder="youtube" value="">
                    </div>
                <!-- /input-group -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </form>    
              <!-- /.card-body -->
            </div>

@endsection