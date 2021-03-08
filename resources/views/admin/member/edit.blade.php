@extends('admin.layout')

@section('title','Member / Edit')
@section('content')
@parent
<div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit member</h3>
                </div>
                <!-- form start -->
                @include('admin.error')
                <form  method="post" id="memForm" action="" onsubmit="validate()">
                                    @csrf
                                    <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                                <label for="memName">Account name</label>
                                                <input type="text" class="form-control" name="accountname" id="memName" placeholder="Enter name" value="{{$member->accountname}}">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 ">
                                                <label for="memEmail">Email</label>
                                                <input type="text" class="form-control" name="email" id="memEmail" placeholder="Enter Email" value="{{$member->email}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="memPass">New Password</label>
                                        <input type="password" class="form-control" name="password" id="memPass" placeholder="Enter Pass" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="memAcPass">Accpet Password</label>
                                        <input type="password" class="form-control" name="acceptpassword" id="memAcPass" placeholder="Enter Pass" value="">
                                    </div>
      
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="Sumit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
</div>

@endsection