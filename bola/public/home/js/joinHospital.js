function save(type){

    var form = new FormData(document.getElementById("postform"));
    form.append('type',type);
    $.ajax({
        type: 'POST',
        url: "/joinpccm",
        processData:false,
        contentType:false,
        dataType: 'json',
        data: form,
        success: function(data){
            if(data.status==1){
                layer.msg(data.message);
                // setTimeout(function(){//两秒后跳转
                //     window.location.href = "/";
                // },1000);
            }else{
                //layer.msg(data.message,{time:1000});
                var json=data.message;
                //json = json.errors;
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

                //URL.revokeObjectURL(blobURL);
                // $("#icon").parent().find("img").remove();
                //
                // $(this).parent().append("<img src='"+blobURL+"' style='width:100px;height:100px;'>");

                obj.getbloburl(blobURL);

                r = new FileReader();
                r.readAsDataURL(file);
                r.onload = function(e) {
                    var base64 = e.target.result;
                    // $(that).parent().find(":input[name=icon]").val(base64);
                    // console.log(base64);
                    obj.getbase64(base64);
                }



            //} else {
            //    layer.msg('只能上传图片',{time:1000});
            //}
        }
    })

}




uploadpic({
    element:$("#image"),
    getbloburl:function(blobURL){
        //$("#image").parent().find("img").remove();
        //$("#image").parent().append("<img src='"+blobURL+"' style='width:100px;height:100px;'>");
    },
    getbase64:function (base_data) {
        $("#image").parent().append(function (e) {
            //$("#image").parent().find(":input[name=image]").remove();
            return "<input type='hidden' name='image' value='"+base_data+"'/>";
        });

    }
});




