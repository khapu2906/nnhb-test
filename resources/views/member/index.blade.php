@extends('member.layout')

@section('title','Thông tin')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline" >
              <div class="card-body box-profile">
                <div class="text-center">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->accountname}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
           
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            @if ($errors->any())
                    <div>
                            @foreach ($errors->all() as $error)
                                @if($error == 'Success')
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{$error}}</strong> 
                                </div>
                                @else
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{$error}}</strong> 
                                </div>
                                @endif
                            @endforeach
                    </div>
            @endif
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#customer" data-toggle="tab">Thông tin mua hàng</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="customer">
                    <!-- Post -->
                    @foreach($customer_list as $customer)
                    <div class="post">
                      <div class="user-block">
                        <span class="username">
                          <a href="#">{{$customer->name}}</a>
                        </span>
                        <span class="description">Sinh nhật: {{date('d/m/Y',strtotime($customer->birthday))}}</span>
                        <span class="description">Địa chỉ: {{str_replace('_',' ',$customer->place)}}</span>
                        <span class="description">Số đơn hàng đã mua: {{$customer->orders}}  <a href="#">Chi tiết</a></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                       {{$customer->note}}
                      </p>

                      <p>
                        <a href="{{url('member/doi-thong-tin-gui-hang')}}/{{$customer->id}}" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i>Sửa thông tin</a>
                        <a href="{{url('member/xoa-thong-tin-gui-hang')}}/{{$customer->id}}" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i>Xóa thông tin</a>
                      </p>
                    </div>
                    @endforeach
                    @if(count($customer_list) < 4)
                      <a href="{{url('member/them-thong-tin-gui-hang')}}" ><button type="button" class="btn">Thêm thông tin</button></a>
                    @endif
                  

                 
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{route('member.edit')}}" method="post" onsubmit="return validate()">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">HỌ VÀ TÊN</label>
                        <div class="col-sm-10">
                          <input type="name" class="form-control" id="inputName"  name="accountname" value="{{Auth::user()->accountname}}" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">MẬT KHẨU MỚI (nhập nếu cần đổi)</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="memPass" name="new_password" placeholder="****">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">XÁC NHẬN MẬT KHẨU MỚI</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="memAcPass" placeholder="****">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">MẬT KHẨU HIỆN TẠI(* nhập để xác nhận)</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="password" placeholder="****">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      


@endsection