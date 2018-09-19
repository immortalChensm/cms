function submitS(id){

    $(".tanchuang1").show();
    $(".tanchuang1").attr("data-id",id);

    $(".tanchuang1").on("click","button",function (e) {
        if($(this).attr("id")  == 'button1'){
            $(".tanchuang1").hide();

            var form = new FormData();
            form.append('id',id);
            $.ajax({
                type: 'POST',
                url: "/referral/canncel",
                processData:false,
                contentType:false,
                dataType: 'json',
                data: form,
                success: function(data){
                    if(data.status==1){
                        layer.msg(data.message);
                        setTimeout(function(){//两秒后跳转
                            window.location.reload();
                        },1000);
                    }else{
                        if(data.status==202){
                            layer.msg("登录超时，正在跳转到登录页面",{time:1000});
                            setTimeout(function(){//两秒后跳转
                                window.location.href = "/login.html?prevurl=/referralrecord.html";
                            },1000);
                        }

                        layer.msg(data.message,{time:1000});
                        // var json=data.message;
                        // //json = json.errors;
                        // for ( var item in json) {
                        //     for ( var i = 0; i < json[item].length; i++) {
                        //         layer.msg(json[item][i],{time:1000});
                        //         return ; //遇到验证错误，就退出
                        //     }
                        // }
                    }
                },
                error:function(data){
                    if (data.status == 422) {
                        var json=JSON.parse(data.responseText);
                        json = json.errors;
                        for ( var item in json) {
                            for ( var i = 0; i < json[item].length; i++) {
                                layer.msg(json[item][i],{time:1000});
                                return ; //遇到验证错误，就退出
                            }
                        }
                    } else {
                        layer.msg('提交错误',{time:1000});
                        return ;
                    }
                }
            });

        }else if($(this).attr("id")  == 'button2'){
            $(".tanchuang1").hide();
            return false;
        }
    })




}


$(function (e) {


    $("#search").on("click",function(e){

        var keyword  = $(":input[name=name]").val();

        window.location.href = "/referralrecord.html?name="+keyword;

    });
})




