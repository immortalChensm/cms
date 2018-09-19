function submitS(type){


    if($(":input[name=oldpassword]").val().length==0){
        layer.msg('请填写旧密码',{time:1000});
        return ;
    }

    if($(":input[name=password]").val().length==0||$(":input[name=password]").val().length<6){
        layer.msg('请填写密码且长度不得小于6位',{time:1000});
        return ;
    }

    if($(":input[name=password_confirmation]").val().length==0||$(":input[name=password_confirmation]").val()!=$(":input[name=password]").val()){
        layer.msg('请填写确认密码且与登录密码一致',{time:1000});
        return ;
    }

    var form = new FormData(document.getElementById("postform"));
    $.ajax({
        type: 'POST',
        url: "/password",
        processData:false,
        contentType:false,
        dataType: 'json',
        data: form,
        success: function(data){
            if(data.status==1){
                layer.msg(data.message[0]);
                setTimeout(function(){//两秒后跳转
                    window.location.reload();
                },1000);
            }else{
                if(data.status==202){
                    layer.msg("登录超时，正在跳转到登录页面",{time:1000});
                    setTimeout(function(){//两秒后跳转
                        window.location.href = "/login.html?prevurl=/alterpsw.html";
                    },1000);
                }else if(data.status==0){
                    layer.msg("旧密码不对",{time:1000});
                }

                var json=data.message;
                json = json.errors;
                for ( var item in json) {
                    for ( var i = 0; i < json[item].length; i++) {
                        layer.msg(json[item][i],{time:1000});
                        return ; //遇到验证错误，就退出
                    }
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

