<table id="bill-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>CODE</th>
                    <th>NOTE</th>
                    <th>STATUS</th>
                    <th>TYPE</th>
                    <th>RATE SALE</th>
                    <th>TOTAL</th>
                    <th style="color:red">TOTAL AFTER SALING *</th>
                    <th>TIME</th>
                    <th>DETAIL ORDER</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  @foreach($bill_list as $bill)
                    <tr>
                      <td>{{$bill['id']}}</td>
                      <td>{{$bill['code']}}</td>
                      <td>{{$bill['note']}}</td>
                      <td>
                      <form method="post" name="frmStatus"> 
                        @csrf
                        <input type="hidden" id="url" value="{!!url('admin/bill-select-status')!!}">
                        <input type="hidden" id="id" value="{{$bill->id}}">
                        <div class="form-group">
                          @php 
                            $color;
                            if($bill->status == 0){
                              $color = 'background:#2c6bb2;color: white';
                            }elseif($bill->status == 1){
                              $color = 'background:#fefd07;color: black';
                            }elseif($bill->status == 2){
                              $color = 'background:#e88436;color: white';
                            }elseif($bill->status == 3){
                              $color = 'background:#55b366;color: white';
                            }else{
                              $color = 'background:#d8212e;color:white';
                            }
                          @endphp
                          <select class="form-control " id="selectstatus-{{$bill->id}}" style="{{$color}}"onchange="selectStatus({{$bill['id']}})" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            @php
                              if($bill['status'] == 0){
                                echo '<option id="defaultStatus-'.$bill->id.'" value="0" selected="selected" style="color:white">New Order</option>';
                              }elseif($bill['status'] == 1){
                                echo '<option id="defaultStatus-'.$bill->id.'"value="1" selected="selected"  style="color:black">Checked</option>';
                              }elseif($bill['status'] == 2){
                                echo '<option id="defaultStatus-'.$bill->id.'" value="2" selected="selected"  style="color:white">Delivered</option>';
                              }elseif($bill['status'] == 3){
                                echo '<option id="defaultStatus-'.$bill->id.'" value="3" selected="selected"  style="color:white">Success</option>';
                              }else{
                                echo '<option id="defaultStatus-'.$bill->id.'" value="4" selected="selected"  style="color:white">Cancel</option>';
                              }
                            @endphp
                            <option value="0" style="background-color: white;color:black">New Order</option>
                            <option value="1"  style="background-color: white;color:black">Checked</option>
                            <option value="2"  style="background-color: white;color:black">Delivered</option>
                            <option value="3"  style="background-color: white;color:black">Success</option>
                            <option value="4"  style="background-color: #d8212e;color:white">Cancel</option>
                          </select>
                        </div>
                      </form>
                      </td>
                      <td>
                        @if($bill['type'] == 0) 
                            Offline
                        @elseif($bill['type'] == 1)
                            Social Media
                        @else
                            Web
                        @endif
                      </td>
                      <td>{!!number_format($bill['rate_sale'])!!} %</td>
                      <td>{!!number_format($bill['total'])!!} VNĐ</td>
                      <td>{!!number_format($bill['total_sale'])!!} VNĐ</td>
                      <td>{{$bill['time']}}</td>
                      <td>
                      <input type="hidden" id="url-get" value="{!!url('admin/bill-detail')!!}">
                      <button type="button" class="btn btn-info" id="buttondetail" onclick="detailProduct({{$bill['id']}})" data-toggle="modal" data-target="#detailorder">
                        Detail
                      </button>
                      </td>
                        <td id="actionEditBill1-{{$bill['id']}}"><a href="{{url('admin/bill-gate-edit')}}/{{$bill['id']}}"   ><i class="fas fa-edit"></i></a></td>
                    </tr>
                  @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>CODE</th>
                    <th>NOTE</th>
                    <th>STATUS</th>
                    <th>TYPE</th>
                    <th>RATE SALE</th>
                    <th>TOTAL</th>
                    <th style="color:red">TOTAL AFTER SALING *</th>
                    <th>TIME</th>
                    <th>DETAIL ORDER</th>
                    <th>ACTION</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$bill_list->links()}}