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
                            $color = 'background:#0d983c;color: white';
                          }elseif($bill->status == 1){
                            $color = 'background:#fefd07;color: black';
                          }else{
                            $color = 'background:#fd0000;color:white';
                          }
                        @endphp
                        <select class="form-control " id="selectstatus-{{$bill->id}}" style="{{$color}}"onchange="selectStatus({{$bill['id']}})" data-dropdown-css-class="select2-danger" style="width: 100%;">
                          @php
                            if($bill['status'] == 0){
                              echo '<option selected="selected" style="color:white">New Order</option>';
                            }elseif($bill['status'] == 1){
                              echo '<option selected="selected"  style="color:black">Checked</option>';
                            }else{
                              echo '<option selected="selected"  style="color:white">Delivered</option>';
                            }
                          @endphp
                          <option value="0" style="background-color: white;color:black">New Order</option>
                          <option value="1"  style="background-color: white;color:black">Checked</option>
                          <option value="2"  style="background-color: white;color:black">Delivered</option>
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
                    <td>{!!number_format($bill['total'])!!}</td>
                    <td>{{$bill['time']}}</td>
                    <td>
                    <input type="hidden" id="url-get" value="{!!url('admin/bill-detail')!!}">
                    <button type="button" class="btn btn-info" id="buttondetail" onclick="detailProduct({{$bill['id']}})" data-toggle="modal" data-target="#detailorder">
                      Detail
                    </button>
                    </td>
                    @if($bill->status == 0)
                      <td><a href="{{url('admin/bill-edit')}}/{{$bill['id']}}" ><i class="fas fa-edit"></i></a></td>
                      <td><a href="{{url('admin/bill-delete')}}/{{$bill['id']}}"><i class="fas fa-trash-alt"></i> </a></td>
                    @else
                      <td colspan="2" style="color:red;">Just act with status is 'New Order'</td>
                    @endif
                  </tr>