

          <label>Customer</label>
          <table  class="table table-bordered table-striped">
                    <thead>
                          <tr>
                              <th>ID</th>
                              <th>TÊN</th>
                              <th>SINH NHẬT</th>
                              <th>SỐ ĐIỆN THOẠI</th>
                              <th>EMAIL</th>
                              <th>ĐỊA CHỈ</th>
                          </tr>
                      </thead>
                      <tbody >
                      @if(!empty($customer))  
                          <tr>
                            <td>{{$customer->id}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->birthday}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->place}}</td>
                          </tr>
                          @endif  
                      </tbody>
                    </table>
             <hr>   
             <label>Cart</label>    
            <table  class="table table-bordered table-striped">
                    <thead>
                          <tr>
                              <th>ID</th>
                              <th>TÊN SẢN PHẨM</th>
                              <th>ẢNH</th>
                              <th>GIÁ</th>
                              <th>GIÁ KHUYẾN MẠI</th>
                              <th>SỐ LƯỢNG</th>
                          </tr>
                    </thead>
                    <tbody >
            @for($i = 0; $i < count($bill_detail);$i++)
                <tr>
                    <td>{{$bill_detail[$i]['id_search']}}</td>
                    <td>{{$bill_detail[$i]['name']}}</td>
                    <td><img src="{{$bill_detail[$i]['image']}}" width="100"></td>
                    <td>{{$bill_detail[$i]['price']}}</td>
                    <td>{{$bill_detail[$i]['encourage_price']}}</td>
                    <td>{{$bill_detail[$i]['quantum_buy']}}</td>
                </tr>
            @endfor
                    </tbody>
                    <tfoot>
                          <tr>
                            <th>ID</th>
                              <th>TÊN SẢN PHẨM</th>
                              <th>ẢNH</th>
                              <th>GIÁ</th>
                              <th>GIÁ KHUYẾN MẠI</th>
                              <th>SỐ LƯỢNG</th>
                          </tr>
                      </tfoot>  
            </table>