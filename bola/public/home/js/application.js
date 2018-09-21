function submitS(){


    if($(":input[name=mobile]").val().length<11){
        layer.msg('电话手机号不对',{time:1000});
        return ;
    }
    var pattern = /^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,1,3,5-8])|(18[0-9])|166|198|199|(147))\d{8}$/;

    if(!pattern.test($(":input[name=mobile]").val())){
        layer.msg('电话手机号格式不对',{time:1000});
        return ;
    }


    if($(":input[name=name]").val().length==0){
        layer.msg('请填写患者姓名',{time:1000});
        return ;
    }


    // if($(":input[name=description]").val().length==0){
    //     layer.msg('请选择患者病情',{time:1000});
    //     return ;
    // }
    //
    // if($(":input[name=ill_breath]").val().length==0){
    //     layer.msg('请选择呼吸支持',{time:1000});
    //     return ;
    // }
    //
    // if($(":input[name=ill_room]").val().length==0){
    //     layer.msg('请选择病房需求',{time:1000});
    //     return ;
    // }
    //
    // if($(":input[name=ill_transfer]").val().length==0){
    //     layer.msg('请选择转运需求',{time:1000});
    //     return ;
    // }
    //
    // if($(":input[name=时间需求]").val().length==0){
    //     layer.msg('请选择时间需求',{time:1000});
    //     return ;
    // }

    var form = new FormData(document.getElementById("postform"));
    $.ajax({
        type: 'POST',
        url: "/referralaplprocess",
        processData:false,
        contentType:false,
        dataType: 'json',
        data: form,
        success: function(data){
            console.log(data);
            if(data.status==1){
                layer.msg('添加成功');
                setTimeout(function(){//两秒后跳转
                    window.location.href="/login/success.html";
                },1000);
            }else if(data.status==202){
                layer.msg('登录过期请重新登录',{time:1000});
                setTimeout(function(){//两秒后跳转
                    window.location.href = "/login.html";
                },1000);
            }else{
                if(data.status==0){
                    layer.msg(data.message.message,{time:1000});
                }else{
                    var json=data.message;
                    json = json.errors;
                    for ( var item in json) {
                        for ( var i = 0; i < json[item].length; i++) {
                            layer.msg(json[item][i],{time:1000});
                            return ; //遇到验证错误，就退出
                        }
                    }
                }

            }
        },
        error:function(data){
            console.log(data);
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
                layer.msg(data.message,{time:1000});
                return ;
            }
        }
    });


}


function uploadpic(obj)
{
    $(obj.element).bind("change",function (e) {
        var files = this.files;
        var URL = window.URL || window.webkitURL;
        var blobURL;
        var file = '';
        var that = this;
        if (files && files.length) {
            file = files[0];

            //if (/^image\/\w+$/.test(file.type)) {
                blobURL = URL.createObjectURL(file);
                obj.getbloburl(blobURL);

                r = new FileReader();
                r.readAsDataURL(file);
                r.onload = function(e) {
                    var base64 = e.target.result;
                    // $(that).parent().find(":input[name=icon]").val(base64);
                    // console.log(base64);
                    obj.getbase64(base64);
                }

               layer.msg('上传成功',{time:1000});

            //} else {
            //    layer.msg('只能上传图片',{time:1000});
            //}
        }
    })

}




// uploadpic({
//     element:$("#image"),
//     getbloburl:function(blobURL){
//
//         //if(/image/.test(blobURL)){
//             $("#image").parent().find("img").remove();
//
//         var box = '<div class="imgxa" id="imgxa">'+
//                     '<img class="imgxaa" src="'+blobURL+'"/>'+
//                     '<img class="cl" id="cl" src="../img/cl.gif"/>'+
//                 '</div>';
//
//         $("#image").parent().append(box);
//         //}
//
//     },
//     getbase64:function (base_data) {
//         if(/image/.test(base_data)){
//             $(".imgxa").show();
//         }else{
//             $(".imgxa").hide();
//         }
//         $("#image").parent().append(function (e) {
//             //$("#image").parent().find(":input[name=image]").remove();
//             return "<input type='hidden' name='case_illfile' value='"+base_data+"'/>";
//         });
//
//     }
// });








