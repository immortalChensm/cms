$(function (e) {

    $(".search").click(function (e) {

        var username = $(":input[name=username]").val();
        var typeid = $(":input[name=typeid]").val();


        window.location.href = "/admin/hospitalapp?username="+username+"&typeid="+typeid;

    });

})