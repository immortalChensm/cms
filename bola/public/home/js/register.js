function register(){

    if($(":input[name=mobile]").val().length<11){
        layer.msg('登录手机号不对',{time:1000});
        return ;
    }
    var pattern = /^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/;

    if(!pattern.test($(":input[name=mobile]").val())){
        layer.msg('登录手机号格式不对',{time:1000});
        return ;
    }
    if($(":input[name=password]").val().length==0||$(":input[name=password]").val().length<6){
        layer.msg('请填写登录密码且长度不得小于6位',{time:1000});
        return ;
    }

    if($(":input[name=code]").val().length==0){
        layer.msg('请填写验证码',{time:1000});
        return ;
    }

    if($(":input[name=password_confirmation]").val().length==0||$(":input[name=password_confirmation]").val()!=$(":input[name=password]").val()){
        layer.msg('请填写确认密码且与登录密码一致',{time:1000});
        return ;
    }

    if($(":input[name=provinceid]").val().length==0){
        layer.msg('请选择省/市',{time:1000});
        return ;
    }

    if($(":input[name=hospitalid]").val().length==0){
        layer.msg('请选择医院',{time:1000});
        return ;
    }

    if($(":input[name=hospital_code]").val().length==0){
        layer.msg('请填写医院代码',{time:1000});
        return ;
    }

    var form = new FormData(document.getElementById("postForm"));

    $.ajax({
        type: 'POST',
        url: "/register",
        processData:false,
        contentType:false,
        dataType: 'json',
        data: form,
        success: function(data){
            if(data.status==1){
                //layer.msg(data.message);
                setTimeout(function(){//两秒后跳转
                     window.location.href = "/login/success.html";
                },1000);
            }else{
                //layer.msg(data.message,{time:1000});
                var json=data.message;
                //json = json.errors;

                json = json.errors;
                if(json){
                    for ( var item in json) {
                        for ( var i = 0; i < json[item].length; i++) {
                            layer.msg(json[item][i],{time:1000});
                            return ; //遇到验证错误，就退出
                        }
                    }
                    return ; //遇到验证错误，就退出
                }else{
                    layer.msg(data.message,{time:1000});
                }


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


}

$(function (e) {
    $("#getCode").on("click",function (e) {


        if($(":input[name=mobile]").val().length<11){
            layer.msg('手机号不对',{time:1000});
            return ;
        }
        var pattern = /^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/;

        if(!pattern.test($(":input[name=mobile]").val())){
            layer.msg('手机号格式不对',{time:1000});
            return ;
        }

        $.ajax({
            type: 'POST',
            url: "/getCode",
            dataType:'json',
            data: {
                "mobile":$(":input[name=mobile]").val()
            },
            success: function(data){
                if(data.status==1){
                    $(":input[name=key]").val(data.message.verifykey);
                    layer.msg('已发送验证码',{time:1000});
                }else{
                    layer.msg('验证码发送错误',{time:1000});
                    return ; //遇到验证错误，就退出

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
                    layer.msg('错误',{time:1000});
                    return ;
                }
            }
        });
    })

    $(":input[name=provinceid]").on("change",function (e) {
        $.ajax({
            type: 'POST',
            url: "/zoneHospital",
            dataType:'json',
            data: {
                "cityid":$(":input[name=provinceid]").val()
            },
            success: function(data){
                if(data.status==1){
                    var options = "";
                    $(":input[name=hospitalid]").find("option").nextAll("option").remove();
                    for(var i=0;i<data.message.length;i++){
                        options+="<option value='"+data.message[i].id+"'>"+data.message[i].name+"</option>";
                    }
                    $(":input[name=hospitalid]").append($(options));
                    //layer.msg('已发送验证码',{time:1000});
                }else{
                    layer.msg('该市不存在医院请重新选择',{time:1000});
                    return ; //遇到验证错误，就退出

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
                    layer.msg('错误',{time:1000});
                    return ;
                }
            }
        });
    })
})





