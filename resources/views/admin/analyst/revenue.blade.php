@extends('admin.layout')

@section('title','Revenue')
@section('content')
@parent
<div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title" >Revenue</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <form action="" method="get">
                
                  <div class="form-group row">
                    <span><h3>From</h3></span>
                    <div class="col-md-2" id="">
                        <input type="date"   name="date_from" class="form-control" value="{{$date_from}}" ></span>
                    </div>
                    <span><h3>to</h3></span>
                    <div class="col-sm-2">
                      <input type="date"   name="date_to" class="form-control" value="{{$date_to}}" >
                    </div>
                    <div class="col-sm-2"> 
                      <button type="submit"  class="btn btn-info"><i class="fas fa-search"></i></button>
                      <a href="{{route('admin.revenue')}}"><button type="button"  class="btn btn-info">Back</button></a>
                    </div>
                  </div>
                </form> 
                  
                </div>
                <div>
                <section class="col-lg-12" id="SaleChart">
                    <div class="card ">
                    <div class="card-header border-0">
                        <h3 class="card-title">
                        <i class="fas fa-th mr-1"></i>
                        Sales Graph in {{$month_current}}/{{$year_current}}
                        </h3>
                        <span style="float:right"><h3><span style="color:red">Total:</span> {{number_format($revenue_total)}} VNĐ<h3></span>
                    </div>
                    <div class="card-body">
                    <input type="hidden" id="idChart" value="line-chart-sale">
                        <input type="hidden"  id="labelsChart" value="{{$chart_label}}">
                        <input type="hidden" id="dataChart" value="{{$chart_value}}">
                        <input type="hidden" id="dataChartOff" value="{{$data_offline}}">
                        <input type="hidden" id="dataChartSM" value="{{$data_SM}}">
                        <input type="hidden" id="dataChartWeb" value="{{$data_web}}">
                        <canvas id="line-chart-sale" style="min-height: 300px; height: 500px; max-height: 700px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer ">
                        <div class="row">
                        <div class="col-4 text-center">
                            <input type="text" class="knob" data-readonly="true" value="{{$rate_total_web }}" data-width="60" data-height="60"
                                data-fgColor="#39CCCC">

                            <div class="text-info">Web</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-4 text-center">
                            <input type="text" class="knob" data-readonly="true" value="{{$rate_total_SM}}" data-width="60" data-height="60"
                                data-fgColor="#39CCCC">

                            <div class="text-info">Social Media</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-4 text-center">
                            <input type="text" class="knob" data-readonly="true" value="{{$rate_total_offline }}" data-width="60" data-height="60"
                                data-fgColor="#39CCCC">

                            <div class="text-info">In-Store</div>
                        </div>
                        <!-- ./col -->  
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                    </div>
                </section>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            
            <!-- /.col -->
          </div>
        <!-- /.row -->
</div>

@endsection