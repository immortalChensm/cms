function submitS(type){

    var form = new FormData(document.getElementById("postform"));
    form.append('type',type);
    $.ajax({
        type: 'POST',
        url: "/profile",
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
                        window.location.href = "/login.html?prevurl=/user/center.html";
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

            if (/^image\/\w+$/.test(file.type)) {
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

            } else {
                layer.msg('只能上传图片',{time:1000});
            }
        }
    })

}




uploadpic({
    element:$("#image"),
    getbloburl:function(blobURL){
        //$("#image").parent().find("img").remove();
        $("#headimg").attr("src",blobURL).css({
            "width":100,
            "hegiht":100
        });
        //$("#image").parent().append("<img src='"+blobURL+"' style='width:100px;height:100px;'>");
    },
    getbase64:function (base_data) {
        $("#image").parent().append(function (e) {
            //$("#image").parent().find(":input[name=image]").remove();
            return "<input type='hidden' name='image' value='"+base_data+"'/>";
        });

    }
});

// uploadpic({
//     element:$("#certFile"),
//     getbloburl:function(blobURL){
//         //$("#image").parent().find("img").remove();
//         //$("#image").parent().append("<img src='"+blobURL+"' style='width:100px;height:100px;'>");
//     },
//     getbase64:function (base_data) {
//         $("#certFile").parent().append(function (e) {
//             //$("#image").parent().find(":input[name=image]").remove();
//             return "<input type='hidden' name='cert' value='"+base_data+"'/>";
//         });
//
//     }
// });


$(function(e){
    
    $("#subjectid").on("change",function (e) {

        getSkill($(this).val());
    });

    getSkill($("#subjectid").val());

})

function getSkill(skillid)
{

    $.ajax({
        type: 'POST',
        url: "/skills",
        dataType: 'json',
        data: {
            'skillid':skillid
        },
        success: function(data){
            if(data.status==1){

                var options = "";
                $("#skillid").find("option").nextAll("option").remove();
                for(var i=0;i<data.message.length;i++){
                    if($("#skill_id").val() == data.message[i].id){
                        options+="<option value='"+data.message[i].id+"' selected>"+data.message[i].name+"</option>";
                    }else{
                        options+="<option value='"+data.message[i].id+"'>"+data.message[i].name+"</option>";
                    }

                }
                $("#skillid").append($(options));
            }else{
                //layer.msg(data.message,{time:1000});
                var json=data.message;
                //json = json.errors;
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
                //layer.msg('提交错误',{time:1000});
                return ;
            }
        }
    });
}



