function submitS(){

    var form = new FormData(document.getElementById("postform"));
    $.ajax({
        type: 'POST',
        url: "/bed",
        processData:false,
        contentType:false,
        dataType: 'json',
        data: form,
        success: function(data){
            if(data.status==1){
                layer.msg('更新成功');
                setTimeout(function(){//两秒后跳转
                    window.location.reload();
                },1000);
            }else{
                if(data.message.status_code==401){
                    layer.msg("登录超时，正在跳转到登录页面",{time:1000});
                    setTimeout(function(){//两秒后跳转
                        window.location.href = "/login.html";
                    },1000);
                }else if(data.message.status_code==0){
                    //layer.msg("旧密码不对",{time:1000});
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

