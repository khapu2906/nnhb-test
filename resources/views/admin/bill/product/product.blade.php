

@if(!empty($product_list))    
    @foreach($product_list as $product)
                <tr id="proId-{{$product['id']}}">
                    <td id="proIdSearch">{{$product['id_search']}}</td>
                    <td id="proName">{{$product['name']}}</td>
                    <td id="proImage"><img src="{{$product['image']}}" width="100"></td>
                    <td id="proPrice">{{$product['price']}}</td>
                    <td id="proQuan">{{$product['quantum']}}</td>
                    <td id="proNote" style="display:none">{{$product['note']}}</td>
                    <td id="proSlug" style="display:none">{{$product['slug']}}</td>
                    <td id="proEncouragePrice">{{$product['encourage_price']}}</td>
                    <td><input type="number" name="quantum_buy" max="{{$product['quantum']}}" style="width:70%" id="quantum-buy-{{$product['id']}}" value="1" min="1"/></td>
                    <td>
                        <div class="form-group">
                            <input type="hidden" id="proIdCart" value="{{$product['id']}}">
                            <button type="button" class="btn btn-info" productId="{{$product['id']}}" id="addProduct" onclick="addItemtoCart({{$product['id']}})" ><i class="fas fa-plus-square"></i></button>
                        </div>
                    </td>
                </tr>
    @endforeach
@elseif(empty($product_list))
    <tr>
        <h3>Not Data</h3>
    </tr>   
@endif
<script src="{{asset('public/resources/admin/cart.js')}}"></script>