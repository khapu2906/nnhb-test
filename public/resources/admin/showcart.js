var drawCheckout = ()=>{
    $('#cartData').empty();
    var cartList = localStorage.getItem(keyCart);
    var cart = (cartList != null)? JSON.parse(cartList): Array();
    console.log(car);
    var ckunit='';
    for(var i = 0; i<cart.length; i++){
            ckunit = `<tr  id="proId-${cart['i'].id}">
                            <td >${cart['i'].id}</td>
                            <td id="proIdSearch">${cart['i'].id_search}</td>
                            <td id="proName">${cart['i'].name}</td>
                            <td id="proImage"><img src="${cart['i'].image}" width="100"></td>
                            <td id="proImage">${cart['i'].price}</td>
                            <td><input type="number" name="quantum_buy" id="quantum-buy-${cart['i'].id}" value="${cart['i'].quantum_buy}" min="1"/>
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" productId="${cart['i'].id}" id="updateProduct" ><i class="fas fa-check-square"></i></button>
                                    <button type="button" class="btn btn-info" productId="${cart['i'].id}" id="updateProduct" ><i class="fas fa-times"></i></button>
                                </div>
                            </td>
                            <td id="proPrice">${cart['i'].price*cart['i'].quantum_buy}</td>
                            <td>
                                <div class="form-group">
                                    <button type="button" class="btn btn-info" productId="${cart['i'].id}" id="dropProduct" >Drop</button>
                                </div>
                            </td>
                        </tr>`;
    }
    //$('#cartData').html(ckunit);
}