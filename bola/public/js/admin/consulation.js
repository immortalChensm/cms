$(function (e) {

    $(".search").click(function (e) {

        var username = $(":input[name=username]").val();
        var mobile = $(":input[name=mobile]").val();

        var hospitalid = $("#hospitalid").val();
        var status = $("#status").val();

        window.location.href = "/admin/consulation?username="+username+"&mobile="+mobile+"&hospitalid="+(hospitalid?hospitalid:"")+"&status="+status;

    });

})