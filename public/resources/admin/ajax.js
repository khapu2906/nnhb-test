


$(document).ready(function(){
    $('#buttondetail').click(function(){
        var url     = $('#url-get').val();
        var id      = $('#id').val();
       $.get(url+'/'+id,function(data){
            $('#detailData').html(data);
       });
    });
});   

var selectStatus = (id) =>{
        var url     = $('#url').val();
        var _token  = $("input[name='_token']").val();
        var status  = $('#selectstatus-'+id).val();
        var defaultStatus = $('#defaultStatus-'+id).val();
        if(status != defaultStatus){
             $.ajax({
                url: url,
                type: 'POST',
                cache: false,
                data: {
                    "_token":_token,
                    "id":id,
                    "status":status,
                    "default":defaultStatus
                },
                success: function(data){
                    document.getElementById('selectstatus-'+id).style.background    = data.background;
                    document.getElementById('selectstatus-'+id).style.color         = data.color;
                    document.getElementById('defaultStatus-'+id).style.color        = data.color;
                    document.getElementById('defaultStatus-'+id).text               = data.value;
                    $('#defaultStatus-'+id).val(status);
                   }
            });
        }
}

$(document).ready(function(){
    $('#chooseProduct').click(function(){
        var url     = $('#url-product').val();
        $.get(url,function(data){
            $('#productData').html(data);
        });
    });
});   

$(document).ready(function(){    
    $('#id_search').on('keyup',function(){
        var url     = $('#url-product').val();
        var id      = $('#id_search').val();
       $.get(url+'/'+id,function(data){
            $('#productData').html(data);
       });
    });
});


var cusSearch = (url) => {
        var key     = $('#cusKey').val();
        var type    = $('#cusType').val();
        if(key == ''){
            $.get(url+'-form',function(data){
                $('#cusDataSearch').html(data);
            });
        }else{
            $.get(url+'-search'+'/'+key+'/'+type,function(data){
                $('#cusDataSearch').html(data);
            });
        }    
}

var detailProduct = (id)=>{
    var url     = $('#url-get').val();
    console(id);
    $.get(url+'/'+id,function(data){
        $('#detailData').html(data);
    });

}

var addBill = () =>{
    sessionStorage.removeItem(keyCart);
    sessionStorage.removeItem(keyCus);
    sessionStorage.removeItem('totalBase');
}

var changeInputKey = ()=>{
    var type = $('#kind_of').val()
    if(type == 0){
        $('#keySearchBill').attr('name') = "date";
    }
}

var changeDisplay = (id) =>{
        var url     = $('#display-'+id).attr('url');
        var _token  = $("input[name='_token']").val();
        var display  = $('#display-'+id).val();
        $.ajax({
            url: url,
            type: 'POST',
            cache: false,
            data: {
                "_token":_token,
                "id":id,
                "display":display
            },
            success: function(data){
                console.log(data);
                if(display ==1){
                    $('#display-'+id).val(0);
                }else{
                    $('#display-'+id).val(1);
                }

            }
        });
}

var detailCustomer = (id) =>{
    var url = $("#buttoncustomer-"+id).attr('url')
    $.get(url+'/'+id,function(data){
        $('#detailCustomer').html(data);
    });
}

var changeStatus = (id) =>{
    var url     = $('#status-'+id).attr('url');
    var _token  = $("input[name='_token']").val();
    var status  = $('#status-'+id).val();
    $.ajax({
        url: url,
        type: 'POST',
        cache: false,
        data: {
            "_token":_token,
            "id":id,
            "status":status
        },
        success: function(data){
            console.log(data);
            if(status ==1){
                $('#status-'+id).val(0);
            }else{
                $('#status-'+id).val(1);
            }
        }
    });
}

var validate = () =>{
    var pass   = $('#memPass').val();
    var acPass = $('#memAcPass').val();
    if(pass != acPass){
        alert("Password and Accept Password don't match")
        return false;
    }
    return true;
}

var formAddCate = (nameParent,parentId) =>{
    $('#parentId').val(parentId);
    nameParent= (nameParent)?nameParent.replace('_',''):0;
    nameParent = (nameParent)?nameParent.replace('|',''):0;
    nameParent = (nameParent)?nameParent.replace('__',''):0;
    $('#parentName').html(nameParent);
}

var changeRateSale = () =>{
    var rateSale  = $('#rateSale').val();
    var total = $('#total').val();
    rateSale = (rateSale =='')? 0: rateSale;
    if(rateSale > 100){
        $('#rateSale').val(100);
        rateSale = 100;
    }else if(rateSale < 0){
        $('#rateSale').val(0);
        rateSale = 0;
    }
    total = total*(100-rateSale)/100;
    var totalstring = `<h5><span style="color:red" for="total">Total: </span>${total} VNĐ</h5>`;
    $('#TOTAL').html(totalstring);
    $('#total_sale').val(total);
}

var detailProduct =(id) =>{
    var url = $('#url-get').val();
    $.get(url+'/'+id,function(data){
        $('#detailData').html(data);
    })
}

//Mutiple select
var categoryProductId = Array();
var categoryProductValue = Array();

$(document).ready(function(){
    if(document.getElementById("formProduct")){
        var categoryId = $('#categorySelectedId').val();
        categoryId = (categoryId!="")? categoryId.split(","):Array();
        for(var i = 0; i < categoryId.length; i++){
            categoryProductId.push(categoryId[i]);
        }
        var categoryValue =    $('#categorySelected').html();
        categoryValue = categoryValue.trim();
        categoryValue = categoryValue.replace(/(\r\n|\n|\r)/gm, "");
        categoryValue =  categoryValue.split('  ').join(''); 
        categoryValue = categoryValue.split("&nbsp;");
        console.log(categoryValue);
        for(var i = 0; i < categoryValue.length; i++){
            if(categoryValue[i]!==''){
                categoryProductValue.push(categoryValue[i]);
            }    
        }
    }    
});

var mutipleSelect = () =>{
    var categoryId= $('#category').val();
    var categoryValue = $('#categoryValue-'+categoryId).html();

    categoryValue = (categoryProductId)?categoryValue.replace('_',''):0;
    categoryValue = (categoryProductId)?categoryValue.replace('|',''):0;
    categoryValue = (categoryProductId)?categoryValue.replace('__',''):0;
    categoryValue = '<span id="selected-'+categoryId+'" style="background:#17a2b8;color:white;padding:5px">'+categoryValue+'</span><i><button type="button" onclick="delemutipleSelect('+categoryId+')">x</button></i>';
    if(categoryProductId.length <= 5){
        if(categoryProductId.indexOf(categoryId)==-1){
            categoryProductId.push(categoryId);
            categoryProductValue.push(categoryValue);

            var categorySelected = categoryProductValue.join('&nbsp');
        }    
        $('#categorySelected').html(categorySelected);
        $('#categorySelectedId').val(categoryProductId);
    }    
}   

var delemutipleSelect = (id) =>{
    var value = $('#selected-'+id).text();
    value = '<span id="selected-'+id+'" style="background:#17a2b8;color:white;padding:5px">'+value+'</span><i><button type="button" onclick="delemutipleSelect('+id+')">x</button></i>';
    id = String(id);
    var indexId = categoryProductId.indexOf(id);    
    var indexValue = categoryProductValue.indexOf(value);
    if(indexId != -1){
        categoryProductValue.splice(indexValue,1);
    }
    if(indexId != -1){
        categoryProductId.splice(indexId,1);
    }    
    var categorySelected = categoryProductValue.join('&nbsp');
    $('#categorySelected').html(categorySelected);
    $('#categorySelectedId').val(categoryProductId);
}

//redirect
var redirectCustomer = () =>{
    var url = $('#formCus').attr('url');
    var key = $('#cusKey').val();
    if(key==""){
        key = null;
    }
    var type = $('#cusType').val();
    window.location = url+'/'+key+'/'+type;
}

var  redirectNew =() =>{
    var url = $('#formNew').attr('url');
    var key = $('#newKey').val();
    window.location = url+'/'+key;
}

var redirectProduct =() =>{
    var url = $('#formPro').attr('url');
    var key = $('#proKey').val();
    var type = $('#proType').val();
    window.location = url+'/'+key+'/'+type;
}

var redirectBill =() =>{
    var url = $('#formBillindex').attr('url');
    var status = $('#billStatus').val();
    var type = $('#billType').val();
    var date = $('#billDate').val();
    var code = $('#billCode').val();
    var where = new Object();
    where.code = code;
    where.status = status;
    where.type = type;
    where.time = date;
    where = JSON.stringify(where);
    console.log(url);
    window.location = url+'/'+where;
}

$(document).ready(function(){
    $('#city').on('change',function(){
        var id = $('#city').val();
        var url = $('#city').attr('url');
        var dataDisplay = ' <option>--Chọn Quận--</option>';
        $.get(url+'/'+id,function(data){
            data.forEach(element => {
                dataDisplay +=`<option id="valueDistrict-${element.id}" value="${element.id}">${element.name}</option>`
            });
            $('#district').html(dataDisplay);
        })
        var city = $('#valueCity-'+id).text();
        $('#cityInput').val(city);
    });

    $('#district').on('change',function(){
        var id = $('#district').val();
        var url = $('#district').attr('url');
        var dataDisplay = ' <option>--Chọn Phường Xã--</option>';
        $.get(url+'/'+id,function(data){
            data.forEach(element => {
                dataDisplay +=`<option id="valueWard-${element.id}" value="${element.id}">${element.name}</option>`
            });
            $('#ward').html(dataDisplay);
        })
        var district = $('#valueDistrict-'+id).text();
        $('#districtInput').val(district);
    });

    $('#ward').on('change',function(){
        var id = $('#ward').val();
        var ward = $('#valueWard-'+id).text();
        $('#wardInput').val(ward);
    });
})