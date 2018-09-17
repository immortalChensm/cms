$(function () {

    $("#search").on("click",function(e){

        var keyword  = $(":input[name=keyword]").val();
        window.location.href = "/teachtrain.html?keyword="+keyword;

    });

    //跳转到详情页面
    $("div.oneteachlist").click(function(){
        if($(this).attr("data-id")){
            window.location.href = "teachtrain/detail/"+$(this).attr("data-id")+".html";
        }

    });


});