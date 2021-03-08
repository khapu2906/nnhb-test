
@extends('admin.layout')

@section('title','Dashboard')
@section('content')
@parent
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div>
            <h5>Data in month {{$month_current}}, {{$year_current}}</h5>
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{!!number_format($revenue_total)!!} <sup style="font-size: 20px">VNĐ</sup></h3>
                <p>Revenue</p>
              </div>
              <div class="icon">
              <i class="fas fa-hand-holding-usd"></i>
              </div>
              <a href="{{route('admin.bill')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{!!number_format($kpi)!!} <sup style="font-size: 20px">VNĐ</sup></h3>

                <p>KPI</p>
              </div>
              <div class="icon">
                <i class="fas fa-flag"></i>
              </div>
              <a href="{{route('admin.kpi')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$amount_of_bill}}</h3>

                <p>Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{route('admin.bill')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$amount_of_use}}</h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{route('admin.member')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable" id="Chart">
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>
              
                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <input type="hidden" id="idChart" value="line-chart">
                <input type="hidden"  id="labelsChart" value="{{$chart_label}}">
                <input type="hidden" id="dataChart" value="{{$chart_value}}">
                <canvas id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="{{$rate_total_web }}" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Web</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="{{$rate_total_SM}}" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Social Media</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="{{$rate_total_offline }}" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->  
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
            <!-- Calendar -->
            <div class="card bg-gradient">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Customer have birthday in this morth
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div  style="width: 100%">
                <table id="bill-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>BIRTHDAY</th>
                    <th>PHONE</th>
                    <th>EMAIL</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($customer_list as $customer)
                  <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->birthday}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->email}}</td>
                  </tr>
                @endforeach
                </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>BIRTHDAY</th>
                    <th>PHONE</th>
                    <th>EMAIL</th>
                  </tr>
                  </tfoot>
                </table> 
                </div>
              </div>
              <!-- /.card-body -->
              {{$customer_list->links()}}
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection