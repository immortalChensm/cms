$(function (e) {

    //search-header style

    $(".search").click(function (e) {

        var hospital_name = $(":input[name=hospital-name]").val();
        var subjectid = $(":input[name=subjectid]").val();
        var skillid = $("#skillid").val();

        var provinceid = $(":input[name=provinceid]").val();
        var cityid = $(":input[name=cityid]").val();
        var countyid = $(":input[name=countyid]").val();


        var grade = $(":input[name=grade]").val();

        var pccm = $(":input[name=pccm]").val();


        window.location.href = "/admin/hospital?hospitalname="+hospital_name+"&subjectid="+subjectid+"&skillid="+(skillid?skillid:"")+"&provinceid="+provinceid+"&cityid="+cityid+"&countyid="+countyid+"&grade="+grade+"&pccm="+pccm;

    });
    //subject
    var subjectid = $(":input[name=subjectid]").val();
    if(subjectid){
        getSkill(subjectid);
    }
    //getciyData
    var areaid = $(":input[name=provinceid]").val();
    if(areaid){
        createAddressHtml(areaid,$(":input[name=cityid]"),$(":input[name=cityid]"));
        var cityid = $(":input[name=cityid]").val();
        if(cityid){
            createAddressHtml(cityid,$(":input[name=countyid]"),$(":input[name=countyid]"));
        }
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
            url: "/admin/hospital/"+skillid+"/skill",
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

    //province
    $(":input[name=provinceid]").on("change",function (e) {

        createAddressHtml($(this).val(),$(":input[name=cityid]"),$(":input[name=cityid]"));
        var cityid = $(":input[name=cityid]").val();
        if(cityid){
            createAddressHtml(cityid,$(":input[name=countyid]"),$(":input[name=countyid]"));
            var countyid = $(":input[name=countyid]").val();
            if(countyid){
                createAddressHtml(countyid,$(":input[name=townid]"),$(":input[name=townid]"));
            }else{
                $(":input[name=countyid]").find("option").remove();
                //$(":input[name=townid]").find("option").remove();
            }
        }else{
            $(":input[name=cityid]").find("option").remove();
        }
    });

    function createAddressHtml(areaid,element,selectHtml)
    {
        getData({
            areaid:areaid,
            callback:function(data){
                if(data){
                    $(element).find("option").remove();
                    var html = "";

                    //index page 搜索时
                    var city_urls = window.location.href.substring(window.location.href.indexOf("cityid")).split("=");
                    var county_urls = window.location.href.substring(window.location.href.indexOf("countyid")).split("=");

                    // if(/\d+/.exec(city_urls[1])[0]){
                    //     html+="<option value='0' selected>不限</option>";
                    // }

                    html+="<option value='0'>不限</option>";
                    var cityid = /\d+/.exec(city_urls[1]);
                    var countyid = /\d+/.exec(county_urls[1]);
                    console.log(cityid);
                    for(var i=0;i<data.length;i++){

                        if(cityid!=null && cityid[0]){
                            if(cityid[0] == data[i].id)html+="<option value='"+data[i].id+"' selected>"+data[i].name+"</option>";
                        }

                        if(countyid!=null && countyid[0]){
                            if(countyid[0] == data[i].id)html+="<option value='"+data[i].id+"' selected>"+data[i].name+"</option>";
                        }

                        html+="<option value='"+data[i].id+"' >"+data[i].name+"</option>";

                    }
                    $(selectHtml).append($(html));
                }

            },
        });
    }
    //city
    $(":input[name=cityid]").on("change",function (e) {
        createAddressHtml($(this).val(),$(":input[name=countyid]"),$(":input[name=countyid]"));

        var countyid = $(":input[name=countyid]").val();

        if(countyid){
            createAddressHtml(countyid,$(":input[name=townid]"),$(":input[name=townid]"));
        }else{
            $(":input[name=countyid]").find("option").remove();
            //$(":input[name=townid]").find("option").remove();
        }


    });


    function getData(obj)
    {
        if(obj.areaid!=0){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $(':input[name=_token]').val()
                }
            });

            $.ajax({
                async:false,
                type: 'GET',
                url: "/admin/region/city",
                dataType: 'json',
                data: {
                    areaid:obj.areaid
                },
                success: function(data){
                    if(data){
                        obj.callback(data);
                    }

                },

            });
        }

    }



})