var keyCart = 'cartList';
var addItemtoCart = (id)=>{
        // Lấy các giá trị từ thẻ
        var proId           = id;
        var proIdSearch     = $('#proId-'+proId).find('#proIdSearch').text();
        var proName         = $('#proId-'+proId).find('#proName').text();
        var proImage        = $('#proId-'+proId).find('img').attr('src');
        var proPrice        = $('#proId-'+proId).find('#proPrice').text();
        var proEncourage    = $('#proId-'+proId).find('#proEncouragePrice').text();
        var proSlug         = $('#proId-'+proId).find('#proSlug').text();
        var proNote         = $('#proId-'+proId).find('#proNote').text();
        var proQuantumBuy   = $('#quantum-buy-'+proId).val();
        proQuantumBuy       = Math.floor(proQuantumBuy );
       // Tạo đối tượng mới
        var itemCart = new Object();
            itemCart.id                     = proId ;
            itemCart.id_search              = proIdSearch;
            itemCart.name                   = proName;
            itemCart.slug                   = proSlug;
            itemCart.image                  = proImage;
            itemCart.price                  = proPrice ;
            itemCart.note                   = proNote;
            itemCart.encourage_price        = proEncourage;
            itemCart.quantum_buy            = proQuantumBuy;
        
        //Kiểm tra đối tượng tồn tại hay chưa
        var flag = false;
        //Kiểm tra trong loacalStorage
        var cartList = sessionStorage.getItem(keyCart);
        var cart = (cartList != null)? JSON.parse(cartList): Array();
        
        for(var i = 0;i < cart.length;i++){
            if(cart[i].id === itemCart.id){
                flag = true;
                track = i;
                break;
            }
        }
        
        if(flag === false){
            cart.push(itemCart);
        }else{
            cart[i].quantum_buy += itemCart.quantum_buy;
        }  
        sessionStorage.setItem(keyCart,JSON.stringify(cart));   
        drawCheckout();
}

var drawCheckout = ()=>{
    var total = 0;
    var rateSale  = $('#rateSale').val();
    rateSale = (rateSale =='')? 0: rateSale;
    var cart = sessionStorage.getItem(keyCart);
    cart = (cart != null)? JSON.parse(cart): Array();
    var ckunit='';
   
        var detail = JSON.stringify(cart);
        cart.forEach(element => {
            var totalItem = (element.encourage_price == 0)? (element.price*element.quantum_buy):(element.encourage_price*element.quantum_buy);
            total += totalItem;
            ckunit += `<tr  id="proId-${element.id}">
                                <td >${element.id}</td>
                                <td id="proIdSearch">${element.id_search}</td>
                                <td id="proName">${element.name}</td>
                                <td id="proImage"><img src="${element.image}" width="100"></td>
                                <td id="proPrice">${element.price}</td>
                                <td id="proEncourage">${element.encourage_price}</td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" class="quantum-buy"  name="quantum_buy" id="quantum-buy-${element.id}" value="${element.quantum_buy}" min="1"/>
                                        <button type="button" class="btn btn-info" productId="${element.id}" id="updateProduct" onclick="updateQuantum(${element.id})" ><i class="fas fa-check-square"></i></button>
                                        <button type="button" class="btn btn-info" productId="${element.id}" id="removeProduct" onclick="removeItemCart(${element.id})"><i class="fas fa-times"></i></button>
                                    </div>
                                </td>
                                <td id="proPrice">${totalItem}</td>
                            </tr>
                            `;
        });
        var totalSale = total*(100-rateSale)/100;
        var totalstring = `<h5><span style="color:red" for="total">Total: </span>${totalSale} VNĐ</h5>`;
    $('#cartData').html(ckunit);
    $('#TOTAL').html(totalstring);
    $('#detail').val(detail);
    $('#total').val(total);
    $('#total_sale').val(totalSale);
}

var updateQuantum = (id)=>{
    var proId    = id;
    var proQuantumBuy   = $('#quantum-buy-'+proId).val();
    proQuantumBuy       = Math.floor(proQuantumBuy );
    var flag = false;
    //Kiểm tra trong loacalStorage
    var cartList = sessionStorage.getItem(keyCart);
    var cart = (cartList != null)? JSON.parse(cartList): Array();
    
    for(var i = 0;i < cart.length;i++){
        if(cart[i].id === id){
            flag = true;
            track = i;
            break;
        }
    }
    
    if(flag === true){
        cart[i].quantum_buy = proQuantumBuy;
    }
    sessionStorage.setItem(keyCart,JSON.stringify(cart));   
    drawCheckout(); 
}

var removeItemCart = (id)=>{
    var flag = false;
    //Kiểm tra trong loacalStorage
    var cartList = sessionStorage.getItem(keyCart);
    var cart = (cartList != null)? JSON.parse(cartList): Array();
    
    for(var i = 0;i < cart.length;i++){
        if(cart[i].id === id){
            flag = true;
            track = i;
            break;
        }
    }
    if(flag === true){
        cart.splice(i,1);
    }
    sessionStorage.setItem(keyCart,JSON.stringify(cart));   
    drawCheckout(); 
}
$(document).ready(function(){
    var detail = $('#detail').val();
    var cart = sessionStorage.getItem(keyCart);
    if(document.getElementById('formBill')){
        if(detail != '' && cart == null){
            sessionStorage.setItem(keyCart,detail);
        }
        drawCheckout();
    }else{
        sessionStorage.removeItem(keyCart);
        sessionStorage.removeItem('totalBase');
    }
})
