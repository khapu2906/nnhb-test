                        <form  method="post" id="cusForm" url="{!!url('admin/customer-add-ajax')!!}" >
                                    @csrf
                                    <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
                                                <label for="cusName">Name</label>
                                                <input type="text" class="form-control" name="name" id="cusName" placeholder="Enter name" value="">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                                <label for="cusPhone">Phone</label>
                                                <input type="number"  maxlength="11" minlength="9" class="form-control" name="phone" id="cusPhone" placeholder="Enter phone" value="">
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                                                <label for="cusBirthday">Birthday</label>
                                                <input type="date" class="form-control" name="birthday" id="cusBirthday" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cusEmail">Email</label>
                                        <input type="text" class="form-control" name="email" id="cusEmail" placeholder="Enter Email" value="">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#place">Địa chỉ</label>
                                            <input type="text" id="place" name="place"  class="form-control"  value="">
                                        </div>
                                        <div class="form-group col-xs-2 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#city">Tỉnh </label>
                                            <select id="city"  class="form-control" url="{{url('district')}}" search>
                                                <option>--Chọn Tỉnh--</option>
                                                @foreach($citys as $ci)
                                                    <option id="valueCity-{{$ci->id}}" value="{{$ci->id}}">{{$ci->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#district">Quận huyện</label>
                                            <select id="district"   class="form-control" url="{{url('ward')}}">
                                            <option>--Chọn Quận--</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <label for="#ward">Xã, Phường </label>
                                            <select id="ward"   class="form-control">
                                            <option>--Chọn Phường Xã--</option>
                                            </select>
                                        </div>
                                    </div>    
                                    <div class="form-group">
                                        <label for="cusNote">Note</label>
                                        <textarea id="cusNote"  name="note" style="width:100%"  class="form-control" rows="3" placeholder="Enter note" >
                                        </textarea>
                                    </div>
                                    <input type="hidden" name="city" id="cityInput" value=''>
                                    <input type="hidden" name="ward" id="wardInput" value=''>
                                    <input type="hidden" name="district" id="districtInput" value=''>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="button" id="addFrCustomer" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                                <script src="{{asset('public/resources/admin/customer.js')}}"></script>
                                <script src="{{asset('public/resources/admin/ajax.js')}}"></script>