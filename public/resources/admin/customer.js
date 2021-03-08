var keyCus = 'cusList';
var addItemtoCus = (id)=>{
        // Lấy các giá trị từ thẻ
        var cusId           = id;
        var cusName         = $('#cusId-'+cusId).find('#cusName').text();
        var cusPhone        = $('#cusId-'+cusId).find('#cusPhone').text();
        var cusBirthday     = $('#cusId-'+cusId).find('#cusBirthday').text();
        var cusPlace        = $('#cusId-'+cusId).find('#cusPlace').text();
        var cusEmail        = $('#cusId-'+cusId).find('#cusEmail').text();
       // Tạo đối tượng mới
        var itemCus = new Object();
            itemCus.id              = cusId ;
            itemCus.name            = cusName;
            itemCus.phone           = cusPhone;
            itemCus.birthday       = cusBirthday ;
            itemCus.place           = cusPlace;
            itemCus.email           = cusEmail;
        
        //Kiểm tra đối tượng tồn tại hay chưa
        var flag = false;
        //Kiểm tra trong loacalStorage
        var cusList = sessionStorage.getItem(keyCus);
        var cus = (cusList != null)? JSON.parse(cusList): Array();
        
        for(var i = 0;i < cus.length;i++){
            if(cus[i].id === itemCus.id){
                flag = true;
                break;
            }
        }
        if(flag === false){
            cus.pop();
            cus.push(itemCus);
        }
        sessionStorage.setItem(keyCus,JSON.stringify(cus));  
        drawCheckoutCus();
}

$(document).ready(function(){
    $('#addFrCustomer').on('click',function(){
        var url = $('#cusForm').attr('url');
        var _token  = $('#cusForm').find("input[name='_token']").val();
        var cusName         = $('#cusForm').find('#cusName').val();
        var cusPhone        = $('#cusForm').find('#cusPhone').val();
        var cusBirthday     = $('#cusForm').find('#cusBirthday').val();
        var cusPlace        = $('#cusForm').find('#cusPlace').val();
        var cusEmail        = $('#cusForm').find('#cusEmail').val();
        var cusNote         = $('#cusForm').find('#cusNote').val();
        $.ajax({
            url: url,
            type: 'POST',
            cache:false,
            data:{
                "_token":_token,
                "name":cusName,
                "phone":cusPhone,
                "birthday":cusBirthday,
                "place":cusPlace,
                "email":cusEmail,
                "note":cusNote
            },
            success:function(data){
                if(data != -1){
                    var itemCus = new Object();
                    itemCus.id              = data ;
                    itemCus.name            = cusName;
                    itemCus.phone           = cusPhone;
                    itemCus.birthday        = cusBirthday ;
                    itemCus.place           = cusPlace;
                    itemCus.email           = cusEmail;
                
                //Kiểm tra đối tượng tồn tại hay chưa
                    var flag = false;
                    //Kiểm tra trong loacalStorage
                    var cusList = sessionStorage.getItem(keyCus);
                    var cus = (cusList != null)? JSON.parse(cusList): Array();
                    
                    for(var i = 0;i < cus.length;i++){
                        if(cus[i].id === itemCus.id){
                            flag = true;
                            break;
                        }
                    }
                    if(flag === false){
                        cus.pop();
                        cus.push(itemCus);
                    }
                    sessionStorage.setItem(keyCus,JSON.stringify(cus));
                    $('#idCustomer').val(cus);   ;  
                    alert('Success');
                }else{
                    alert('The data is not invalid');
                }
            }
        })
    });
});

var drawCheckoutCus = () =>{
    var cus = sessionStorage.getItem(keyCus);
    cus = (cus != null)? JSON.parse(cus): Array();
    var customer = JSON.stringify(cus);
    var ckunit='';   
        cus.forEach(element => {
            ckunit += `<tr  id="cusId-${element.id}">
                                <td id="cusId" >${element.id}</td>
                                <td id="cusName">${element.name}</td>
                                <td id="cusPhone">${element.phone}</td>
                                <td id="cusBirthday">${element.birthday}</td>
                                <td id="cusPlace">${element.place}</td>
                                <td id="cusEmail">${element.email}</td>
                            </tr>
                            `;
            id = element.id;
        });
    $('#cusData').html(ckunit);
    $('#idCustomer').val(customer);   
}

$(document).ready(function(){
    var cusDetail = $('#idCustomer').val();
    var cus = sessionStorage.getItem(keyCus);
        if(document.getElementById('formBill')){
            if(cusDetail != ''  && cus == null){
                sessionStorage.setItem(keyCus,cusDetail);
            }
            drawCheckoutCus();
        }else{
            sessionStorage.removeItem(keyCus);
        }
})


