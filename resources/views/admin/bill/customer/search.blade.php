            <table  class="table table-bordered table-striped" style="width:100%">
                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>birth day</th>
                                        <th>phone</th>
                                        <th>email</th>
                                        <th>place</th>
                                        <th>action</th>
                                    </tr>
                </thead>
                <tbody>   
@if(!empty($customer_list))                              
    @foreach($customer_list as $customer)
                <tr id="cusId-{{$customer['id']}}">
                    <td >{{$customer['id']}}</td>
                    <td id="cusName">{{$customer['name']}}</td>
                    <td id="cusBirthday">{{$customer['birthday']}}</td>
                    <td id="cusPhone">{{$customer['phone']}}</td>
                    <td id="cusEmail">{{$customer['email']}}</td>
                    <td id="cusPlace">{{$customer['place']}}</td>
                    <td>
                        <div class="form-group">
                            <input type="hidden" id="cusIdCart" value="{{$customer['id']}}">
                            <button type="button" class="btn btn-info" customerId="{{$customer['id']}}" id="addProduct" onclick="addItemtoCus({{$customer['id']}})" ><i class="fas fa-check"></i></button>
                        </div>
                    </td>
                </tr>
    @endforeach   
@endif
                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>birth day</th>
                                        <th>phone</th>
                                        <th>email</th>
                                        <th>place</th>
                                        <th>action</th>
                                    </tr>
                                </tfoot>  
                            </table>