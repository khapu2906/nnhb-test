<table id="bill-table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>MÃ ĐƠN</th>
                    <th>GHI CHÚ</th>
                    <th>TRẠNG THÁI ĐƠN</th>
                    <th>LOẠI ĐƠN</th>
                    <th>TỶ LỆ SALE</th>
                    <th>TỔNG TIỀN</th>
                    <th style="color:red">TỔNG TIỀN SAU SALE *</th>
                    <th>THỜI GIAN</th>
                    <th>CHI TIẾT DƠN HÀNG</th>
                  </tr>
                  </thead>
                  <tbody>
                
                  @foreach($bill_list as $bill)
                    <tr>
                      <td>{{$bill['code']}}</td>
                      <td>{{$bill['note']}}</td>
                      <td>
                        <div class="form-group">
                         
                            @php
                              if($bill['status'] == 0){
                                echo '<p id="defaultStatus-'.$bill->id.'" value="0" selected="selected" style="color:black">Đơn mới/p>';
                              }elseif($bill['status'] == 1){
                                echo '<p id="defaultStatus-'.$bill->id.'"value="1" selected="selected"  style="color:black">Đơn đã xác nhận</p>';
                              }elseif($bill['status'] == 2){
                                echo '<p id="defaultStatus-'.$bill->id.'" value="2" selected="selected" style="color:black">Đơn đang giao</p>';
                              }elseif($bill['status'] == 3){
                                echo '<p id="defaultStatus-'.$bill->id.'" value="3" selected="selected"  style="color:black">Đơn hàng thành công</p>';
                              }else{
                                echo '<p id="defaultStatus-'.$bill->id.'" value="4" selected="selected"  style="color:red">Hủy</p>';
                              }
                            @endphp
                          </select>
                        </div>
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
                      <input type="hidden" id="url-get" value="{!!url('member/don-hang-detail')!!}">
                      <button type="button" class="btn btn-info" id="buttondetail" onclick="detailProduct({{$bill['id']}})" data-toggle="modal" data-target="#detailorder">
                        CHI TIẾT
                      </button>
                      </td>
                    </tr>
                  @endforeach  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>MÃ ĐƠN</th>
                    <th>GHI CHÚ</th>
                    <th>TRẠNG THÁI ĐƠN</th>
                    <th>LOẠI ĐƠN</th>
                    <th>TỶ LỆ SALE</th>
                    <th>TỔNG TIỀN</th>
                    <th style="color:red">TỔNG TIỀN SAU SALE *</th>
                    <th>THỜI GIAN</th>
                    <th>CHI TIẾT DƠN HÀNG</th>
                  </tr>
                  </tfoot>
                </table> 
                
                {{$bill_list->links()}}