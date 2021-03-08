<div class="modal fade " id="producttable" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  >
                    <div class="modal-dialog modal-lg" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <h4 class="modal-title w-100" id="myModalLabel">Choose Product</h4>
                            <button type="button" class="close" data-dismiss="modal" onclick="drawCheckout()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                            <span>Search</span>
                            <input type="text" id="id_search"  placeholder="Enter Id">
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table  class="table table-bordered table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>image</th>
                                                <th>price</th>
                                                <th>current quantum</th>
                                                <th>encourage price</th>
                                                <th>quantum</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody  id="productData">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>image</th>
                                                <th>price</th>
                                                <th>current quantum</th>
                                                <th>encourage price</th>
                                                <th>quantum</th>
                                                <th>action</th>
                                            </tr>
                                        </tfoot>  
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeProduct" onclick="drawCheckout()">Close</button>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
</div>                