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