             <label>Category </label>    
            <table  class="table table-bordered table-striped">
                    <thead>
                          <tr>
                              <th>ID</th>
                              <th>NAME</th>
                              <th>SLUG</th>
                          </tr>
                    </thead>
                    <tbody >
            @foreach($category_product_list as $category_product)
                <tr>
                    <td>{{$category_product['id']}}</td>
                    <td>{{$category_product['name']}}</td>
                    <td>{{$category_product['slug']}}</td>
                </tr>
            @endforeach
                    </tbody>
                    <tfoot>
                          <tr>
                          <th>ID</th>
                              <th>NAME</th>
                              <th>SLUG</th>
                          </tr>
                      </tfoot>  
            </table>