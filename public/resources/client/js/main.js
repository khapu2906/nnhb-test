if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    //nếu lớn hơn 20px thì hiện button
    document.getElementById("Top").style.display = "block";
    //document.getElementById("nav").syle
} else {
    //nếu nhỏ hơn 20px thì ẩn button
    document.getElementById("Top").style.display = "none";
}
$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 20) $("#Top").fadeIn();
        else $("#Top").fadeOut();
    });
    $("#Top").click(function() {
        $("body,html").animate({ scrollTop: 0 }, "slow");
    });

    $("#loadMore").on('click',function(){
        var land = $('#inputLoad').val();
        var slug = $('#inputLoad').attr('slug');
        slug = (slug =='')?null: slug;
        var url = $('#productList').attr('url');
        var count =  $('#countProduct').html();
        var sort = $('#sortProduct').val();
        count = Number(count);
        land = Number(land) + 16;
        $.get(url+'/'+land+'/'+slug+'/'+sort,function(data){
            $('#productList').html(data);
            $('#inputLoad').val(land);
        });
        if(land >= count){
            document.getElementById('loadMore').style.display = "none";
        }
        
    });

    $('#sortProduct').on('change',function(){
        var land = $('#inputLoad').val();
        var slug = $('#inputLoad').attr('slug');
        slug = (slug =='')?null: slug;
        var url = $('#productList').attr('url');
        var sort = $('#sortProduct').val();
        $.get(url+'/'+land+'/'+slug+'/'+sort,function(data){
            $('#productList').html(data);
            $('#inputLoad').val(land);
        });
        
    });

    $('#cart').on('click',function(){
        document.getElementById('Cart').style.display = "block";
        document.getElementById('cart-close').style.display = "block";
        document.getElementById('overBack').style.display = "block";
        drawCheckout();
    });
    $('#cart-close').on('click',function(){
        document.getElementById('Cart').style.display = "none";
        document.getElementById('cart-close').style.display = "none";
        document.getElementById('overBack').style.display = "none";
    });
});

$(window).on('load', function() {
    if(document.getElementById('productList')){
        var url = $('#productList').attr('url');
        var slug = $('#inputLoad').attr('slug');
        slug = (slug =='')?null: slug;
        var sort = $('#sortProduct').val();
        var land = 16;
        $.get(url+'/'+land+'/'+slug+'/'+sort,function(data){
            $('#productList').html(data);
            $('#inputLoad').val(land);
            var count =  $('#countProduct').html();
            count = Number(count);
            if(land >= count){
                document.getElementById('loadMore').style.display = "none";
            }
        });
    }    
});
var payAuth =(id) =>{
    var url = $('#info_customer').attr('url');
    url += '/'+ id;
    //console.log(url); 
    window.location = url;
}

var validate = () =>{
    var pass   = $('#memPass').val();
    var acPass = $('#memAcPass').val();
    if(pass != acPass){
        var error = `<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Mật khẩu không trùng nhau</strong> <br></div>`;
        $("#errorpass").html(error);
        return false;
    }
    return true;
}


