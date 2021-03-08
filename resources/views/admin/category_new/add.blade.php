                        <form  method="post" id="cateForm" action="{{route('admin.category.new.add')}}" >
                                    @csrf
                                    <div class="card-body">
                                    <h4 id="parentName"></h4>

                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" onkeyup="ChangeToSlug()" placeholder="Enter Name" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" class="form-control" name="slug" id="slug"  placeholder="" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="parent_id" id="parentId" placeholder="" value="">
                                    </div>
      
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" id="addFrCustomer" class="btn btn-info">Submit</button>
                                    </div>
                                </form>