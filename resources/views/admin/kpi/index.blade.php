@extends('admin.layout')

@section('title','KPI')
@section('content')
@parent
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">KPI TABLE</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>AIM</th>
                    <th>TIME (Month/Year)</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($kpi_list as $kpi)
                  <tr>
                    <td>{{$kpi['id']}}</td>
                    <td>{!!number_format($kpi['aim'])!!} VNĐ</td>
                    <td>{!!date("m / Y",strtotime($kpi->time))!!}</td>
                    <td><a href="{{url('admin/kpi-edit')}}/{{$kpi['id']}}"><i class="fas fa-edit"></i></a></td>
                    <td><a href="{{url('admin/kpi-delete')}}/{{$kpi['id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                  </tr>
                @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>AIM</th>
                    <th>TIME (Month/Year)</th>
                    <th colspan="2">ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$kpi_list->links()}}
                <div class="card-footer">
                  <a href="{{url('admin/kpi-add')}}"><button style="width:20%;align-items: center;" class="btn btn-info">Add</button></a>
                </div>
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