$(function (e) {

    $(".search").click(function (e) {

        var username = $(":input[name=username]").val();
        var subjectid = $(":input[name=subjectid]").val();
        var hospitalid = $(":input[name=hospitalid]").val();
        var skillid = $("#skillid").val();
        window.location.href = "/admin/pyhsician?username="+username+"&subjectid="+subjectid+"&skillid="+(skillid?skillid:"")+"&hospitalid="+hospitalid;

    });
    //subject
    var subjectid = $(":input[name=subjectid]").val();
    if(subjectid){
        getSkill(subjectid);
    }


    $(":input[name=subjectid]").on("change",function(e){

        getSkill($(this).val());
    });


    function getSkill(skillid)
    {
        $("#skillid").find("option").remove();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $(':input[name=_token]').val()
            }
        });
        $.ajax({
            type: 'POST',
            url: "/admin/pyhsician/"+skillid+"/skill",
            dataType: 'json',
            data: {
                subjectid:skillid
            },
            success: function(data){

                if(data){
                    var options = "";
                    options+="<option value=''>选择专业特长</option>";
                    //edit
                    var edit_skill_id = $(":input[name=skill-edit-id]").val();
                    if(edit_skill_id!=null){
                        edit_skill_id = edit_skill_id.split(",");
                    }
                    var selects = [];
                    if(edit_skill_id!=null){
                        for(var j=0;j<edit_skill_id.length;j++){
                            //selects.push(edit_skill_id[j]);
                            selects[edit_skill_id[j]] = edit_skill_id[j];

                        }
                    }

                    for(var i=0;i<data.length;i++){
                        options+="<option value='"+data[i].id+"' >"+data[i].name+"</option>";
                    }



                    $("#skillid").append($(options));

                    for(var k=0;k<$("#skillid").find("option").length;k++){
                        if(selects[$("#skillid").find("option").eq(k).val()]){
                            $("#skillid").find("option").eq(k).get(0).selected = "selected";
                        }
                    }

                    //index page
                    var locations = window.location.href.substring(window.location.href.indexOf("skillid")).split("=");
                    var skillidList = $("#skillid").find("option");

                    for(var i=0;i<skillidList.length;i++){
                        if($(skillidList).eq(i).val() == /\d+/.exec(locations[1])[0]){
                            $(skillidList).eq(i).get(0).selected = "selected";
                        }

                    }

                }

            },

        });
    }

})