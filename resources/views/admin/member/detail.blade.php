   
            <table  class="table table-bordered table-striped">
                    <thead>
                          <tr>
                              <th>ID</th>
                              <th>NAME</th>
                              <th>BRITH DAY</th>
                              <th>PHONE</th>
                              <th>EMAIL</th>
                          </tr>
                    </thead>
                    <tbody >
            @foreach($customer_list as $customer)
                <tr>
                    <td>{{$customer['id']}}</td>
                    <td>{{$customer['name']}}</td>
                    <td>{{$customer['brithday']}}</td>
                    <td>{{$customer['phone']}}</td>
                    <td>{{$customer['email']}}</td>
                </tr>
            @endforeach
                    </tbody>
                    <tfoot>
                          <tr> 
                              <th>ID</th>
                              <th>NAME</th>
                              <th>BRITH DAY</th>
                              <th>PHONE</th>
                              <th>EMAIL</th>
                          </tr>
                      </tfoot>  
            </table>