var keyCart = 'cartList';
var countCart = 'countCart';

var addItemtoCart = (id)=>{
        // Lấy các giá trị từ thẻ
        var proId           = id;
        var proIdSearch     = $('#proId-'+proId).find('#proIdSearch').text();
        var proName         = $('#proId-'+proId).find('#proName').text();
        var proImage        = $('#proId-'+proId).find('img').attr('src');
        var proPrice        = $('#proId-'+proId).find('#proPrice').text();
        var proEncourage    = $('#proId-'+proId).find('#proEncouragePrice').text();
        var proSlug         = $('#proId-'+proId).find('#proSlug').text();
        var proQuantumBuy   = $('#quantum-buy-'+proId).text();
        proQuantumBuy       = Math.floor(proQuantumBuy );
       // Tạo đối tượng mới
       
        var itemCart = new Object();
            itemCart.id                     = proId ;
            itemCart.id_search              = proIdSearch;
            itemCart.name                   = proName;
            itemCart.slug                   = proSlug;
            itemCart.image                  = proImage;
            itemCart.price                  = proPrice ;
            itemCart.encourage_price        = proEncourage;
            itemCart.quantum_buy            = proQuantumBuy;
    
        //Kiểm tra đối tượng tồn tại hay chưa
        var flag = false;
        //Kiểm tra trong loacalStorage
        var cartList = localStorage.getItem(keyCart);
        var count = localStorage.getItem(countCart);
        var cart = (cartList != null)? JSON.parse(cartList): Array();
        count = Number(count) +proQuantumBuy; 
        
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
        localStorage.setItem(countCart,count);   
        localStorage.setItem(keyCart,JSON.stringify(cart));   
        $('#numberProduct').html(count);
        drawCheckout();
        
}

var drawCheckout = ()=>{
    var total = 0;
    var rateSale  = $('#rateSale').val();
    rateSale = (rateSale =='')? 0: rateSale;
    var cart = localStorage.getItem(keyCart);
    cart = (cart != null)? JSON.parse(cart): Array();
    var ckunit='';
   
        var detail = JSON.stringify(cart);
        cart.forEach(element => {
            var totalItem = (element.encourage_price == 0)? (element.price*element.quantum_buy):(element.encourage_price*element.quantum_buy);
            total += totalItem;
            var PriPrimary = (element.encourage_price == 0)? element.price: element.encourage_price;
            ckunit += `<button id="closeCart" productId="${element.id}" onclick="removeItemCart(${element.id})">X</button>
                            <div class="cart-element">
                                <div class="card product-card">
                                <p id="proId-${element.id}" style="display:none;">${element.id}</p>
                                <div class="row">
                                    <div  class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="image-product" >
                                        <img class="card-img-top" id="cart-product-image" src="${element.image}"  >
                                    </div>
                                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="card-title" style="float:left"><strong>${element.name}</strong></p>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                    <span style="background-color: #ededed;padding:5px ;float:left;">SL: ${element.quantum_buy}</span>
                                                </div>
                                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                                    <span style="color:#f94c43;float:left;">${new Intl.NumberFormat('vi', { maximumSignificantDigits: 3 }).format(PriPrimary)}đ</span>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="cartHr">
                            `;
        });
        var totalSale = new Intl.NumberFormat('vi', { maximumSignificantDigits: 3 }).format(total);
        var totalstring = `<h5><span style="color:red" for="total">Tổng: </span>${totalSale} VNĐ</h5>`;
    $('#cartBody').html(ckunit);
    $('#cartPay').html(ckunit);
    $('#TOTAL').html(totalstring);
    $('#detail').val(detail);
    $('#total').val(total);
}

var drawCheckfull =() =>{
    var total = 0;
    var rateSale  = $('#rateSale').val();
    rateSale = (rateSale =='')? 0: rateSale;
    var cart = localStorage.getItem(keyCart);
    cart = (cart != null)? JSON.parse(cart): Array();
    var ckunit='';
        var detail = JSON.stringify(cart);
        cart.forEach(element => {
            var totalItem = (element.encourage_price == 0)? (element.price*element.quantum_buy):(element.encourage_price*element.quantum_buy);
            total += totalItem;
            var PriPrimary = (element.encourage_price == 0)? element.price: element.encourage_price;
            ckunit += `<button id="closeCart" productId="${element.id}" onclick="removeItemCart(${element.id})">X</button>
                            <div class="cart-element-full">
                                <div class="card product-card">
                                <p id="proId-${element.id}" style="display:none;">${element.id}</p>
                                    <div class="row">
                                        <div  class="col-xs-1 col-sm-1 col-md-1 col-lg-1" id="image-product" >
                                            <p class="card-title" style="float:left"><strong>${element.name}</strong></p>
                                        </div>
                                        <div  class="col-xs-1 col-sm-1 col-md-1 col-lg-1" id="image-product" >
                                            <img class="card-img-top" id="cart-product-image-full" src="${element.image}"  >
                                        </div>
                                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p class="card-title" style="float:left"><strong>${element.id_search}</strong></p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                            <div class="form-group">
                                                            <input type="text"  max="10000" min="1" class="quantum-buy form-control " name="quantum_buy" onchange="updateQuantum(${element.id})" id="quantum-buy-${element.id}" value="${element.quantum_buy}" />
                                                            </div>
                                                            <div >
                                                                <span style="color:#f94c43;float:left;">${new Intl.NumberFormat('vi', { maximumSignificantDigits: 3 }).format(PriPrimary)}đ</span>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>   
                                                </div>
                                            </div>
                                        </div> 
                                        <div  class="col-xs-1 col-sm-1 col-md-1 col-lg-1" id="image-product" >
                                        </div>
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1" >
                                                        <span style="color:#f94c43;"><strong>${new Intl.NumberFormat('vi', { maximumSignificantDigits: 3 }).format(totalItem)}đ</strong></span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <hr class="cartHr">
                            `;
        });
        var totalSale = new Intl.NumberFormat('vi', { maximumSignificantDigits: 3 }).format(total);
        var totalstring = `<h5><span style="color:red" for="total">Tổng: </span>${totalSale} VNĐ</h5>`;
    $('#cartBodyFull').html(ckunit);
    $('#TOTAL').html(totalstring);
    $('#detail').val(detail);
    $('#total').val(total);
}

var updateQuantum = (id)=>{
    var proId    = id;
    var proQuantumBuy   = $('#quantum-buy-'+proId).val();
    proQuantumBuy       = Math.floor(proQuantumBuy );
    var flag = false;
    //Kiểm tra trong loacalStorage
    var cartList = localStorage.getItem(keyCart);
    var cart = (cartList != null)? JSON.parse(cartList): Array();
    var count = localStorage.getItem(countCart);
    for(var i = 0;i < cart.length;i++){
        if(cart[i].id === id){
            flag = true;
            track = i;
            break;
        }
    }
    
    if(flag === true){
        count = Number(count) - Number(cart[i].quantum_buy) + proQuantumBuy; 
        cart[i].quantum_buy = proQuantumBuy;
    }
    localStorage.setItem(countCart,count);  
    localStorage.setItem(keyCart,JSON.stringify(cart));   
    $('#numberProduct').html(count);
    drawCheckout(); 
    drawCheckfull();
}

var removeItemCart = (id)=>{
    var flag = false;
    //Kiểm tra trong loacalStorage
    var cartList = localStorage.getItem(keyCart);
    var cart = (cartList != null)? JSON.parse(cartList): Array();
    var count = localStorage.getItem(countCart);
    for(var i = 0;i < cart.length;i++){
        if(cart[i].id === id){
            flag = true;
            track = i;
            break;
        }
    }
    if(flag === true){
        count = Number(count) - Number(cart[i].quantum_buy); 
        cart.splice(i,1);
    }
    localStorage.setItem(countCart,count);  
    localStorage.setItem(keyCart,JSON.stringify(cart));  
    $('#numberProduct').html(count); 
    drawCheckout(); 
    drawCheckfull();
}
$(document).ready(function(){
    var count = (localStorage.getItem(countCart))?localStorage.getItem(countCart):0;
    $('#numberProduct').html(count);
    if(document.getElementById('cartList')){
        drawCheckfull();
        drawCheckout();
    }
});

$(document).ready(function(){
    $('#quantum_input').on('change',function(){
        var quantum = $('#quantum_input').val();
        var proId   = $('#quantum_input').attr('productId');
        var max = $('#quantum_input').attr('max');
        var min = $('#quantum_input').attr('min');
        if(Number(quantum) < min){
            $('#quantum_input').val(min);
            quantum  = min;
        }else if(Number(quantum) > max){
            $('#quantum_input').val(max);
            quantum  = max;
        }
        console.log(quantum);
        $('.quantum-'+proId).text(quantum);
    });
});

$(document).ready(function(){
    if(document.getElementById('cartSuccess')){
        localStorage.removeItem(keyCart);
        localStorage.removeItem(countCart);
        drawCheckout(); 
    }
    var count = (localStorage.getItem(countCart))?localStorage.getItem(countCart):0;
    $('#numberProduct').html(count);
})