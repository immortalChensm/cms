function login(type){

    if($(":input[name=mobile]").val().length<11){
        layer.msg('登录手机号不对',{time:1000});
        return ;
    }
    var pattern = /^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/;

    if(!pattern.test($(":input[name=mobile]").val())){
        layer.msg('登录手机号格式不对',{time:1000});
        return ;
    }
    if($(":input[name=password]").val().length==0){
        layer.msg('请填写登录密码',{time:1000});
        return ;
    }

    var form = new FormData();
    form.append('mobile',$(":input[name=mobile]").val());
    form.append('password',$(":input[name=password]").val());
    $.ajax({
        type: 'POST',
        url: "/login",
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
                var json=data.message.message;
                //json = json.errors;

                layer.msg(json,{time:1000});
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
                layer.msg('提交错误',{time:1000});
                return ;
            }
        }
    });


}





