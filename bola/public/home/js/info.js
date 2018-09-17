$(function () {

    $("#search").on("click",function(e){

        var keyword  = $(":input[name=keyword]").val();
        window.location.href = "/information.html?keyword="+keyword;

    });

    //跳转到详情页面
    $("div.oneteachlist").click(function(){
        if($(this).attr("data-id")){
            window.location.href = "/information/detail/"+$(this).attr("data-id")+".html";
        }

    });


});