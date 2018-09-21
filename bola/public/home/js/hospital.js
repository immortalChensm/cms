$(function () {

    $("#search").on("click",function(e){

        var keyword  = $(":input[name=keyword]").val();
        var province = $(":input[name=province]").val();
        var city     = $(":input[name=city]").val();
        var county   = $(":input[name=county]").val();

        window.location.href = "/hospitals.html?keyword="+keyword+"&province="+(province?province:'')+"&city="+(city?city:'')+"&county="+(county?county:'');

    });

    $(":input[name=province],:input[name=city],:input[name=county]").on("change",function (e) {

        var keyword  = $(":input[name=keyword]").val();
        var province = $(":input[name=province]").val();
        var city     = $(":input[name=city]").val();
        var county   = $(":input[name=county]").val();
        window.location.href = "/hospitals.html?keyword="+keyword+"&province="+(province?province:'')+"&city="+(city?city:'')+"&county="+(county?county:'');

    });


    //跳转到详情页面
    $("div.yylistt-xq").click(function(){
        window.location.href = "hospital/detail/"+$(this).attr("data-id")+".html";
    });

    $(":input[name=province]").on("change",function (e) {

        if($(this).val()==0){
            $(":input[name=city]").find("option").next("option").remove();
            $(":input[name=county]").find("option").next("option").remove();
        }
        createAddressHtml($(this).val(),$(":input[name=city]"),$(":input[name=city]"));

    })



    $(":input[name=city]").on("change",function (e) {
        if($(this).val()==0){
            $(":input[name=county]").find("option").next("option").remove();
        }
        createAddressHtml($(this).val(),$(":input[name=county]"),$(":input[name=county]"));

    })

    function createAddressHtml(areaid,element,selectHtml)
    {
        getData({
            areaid:areaid,
            callback:function(data){
                if(data){

                    $(element).find("option").next("option").remove();

                    var html = "";

                    //index page 搜索时


                    //html+="<option value='0' >请选择</option>";

                    for(var i=0;i<data['message'].length;i++){
                        //if(i==0){
                        //    html+="<option value='"+data['message'][i].id+"' selected>"+data['message'][i].name+"</option>";
                        //}else{
                            html+="<option value='"+data['message'][i].id+"'>"+data['message'][i].name+"</option>";
                        //}

                    }
                }
                $(selectHtml).append($(html));
            },
        });
    }

    function getData(obj)
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $(':input[name=_token]').val()
            }
        });

        $.ajax({
            async:false,
            type: 'GET',
            url: "/region/city",
            dataType: 'json',
            data: {
                areaid:obj.areaid
            },
            success: function(data){
                if(data){
                    obj.callback(data);
                }

            },

        });
    }

    if($(":input[name=province]").val()>0){
        createAddressHtml($(":input[name=province]").val(),$(":input[name=city]"),$(":input[name=city]"));
    }

    var location_urls = window.location.href.substring(window.location.href.indexOf("city")).split("=");

    if(location_urls[1]!=undefined){
        if(location_urls[1].split("&")[0]){
            console.log($(":input[name=city]").val());
            createAddressHtml(location_urls[1].split("&")[0],$(":input[name=county]"),$(":input[name=county]"));
        }

    }





    var city_urls = window.location.href.substring(window.location.href.indexOf("county")).split("=");
    //console.log(location_urls[1].split("&"));
    var cityList = $(":input[name=city]").find("option");
    for(var i=0;i<cityList.length;i++){
        if(location_urls[1]!=undefined){
            if(location_urls[1].split("&")[0] == $(cityList).eq(i).val()){
                $(cityList).eq(i).get(0).selected = "selected";
            }
        }

    }

    var countyList = $(":input[name=county]").find("option");
    for(var i=0;i<countyList.length;i++){
        if(city_urls[1]!=undefined){
            if(city_urls[1].split("&")[0] == $(countyList).eq(i).val()){
                $(countyList).eq(i).get(0).selected = "selected";
            }
        }

    }
});