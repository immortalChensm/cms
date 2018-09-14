$(function (e) {

    //search-header style

    $(".search").click(function (e) {

        var hospital_name = $(":input[name=hospital-name]").val();
        var subjectid = $(":input[name=subjectid]").val();
        var skillid = $("#skillid").val();

        var provinceid = $(":input[name=provinceid]").val();
        var cityid = $(":input[name=cityid]").val();
        var countyid = $(":input[name=countyid]").val();


        window.location.href = "/admin/hospital?hospitalname="+hospital_name+"&subjectid="+subjectid+"&skillid="+(skillid?skillid:"")+"&provinceid="+provinceid+"&cityid="+cityid+"&countyid="+countyid;

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
                            options+="<option value='"+data[i].id+"-"+data[i].name+"' >"+data[i].name+"</option>";
                    }



                    $("#skillid").append($(options));

                    for(var k=0;k<$("#skillid").find("option").length;k++){

                        if(selects[$("#skillid").find("option").eq(k).val().split('-')[0]]){
                            $("#skillid").find("option").eq(k).get(0).selected = "selected";

                            $("#skillid_bak").append("<option value='"+$("#skillid").find("option").eq(k).val().split('-')[0]+"'>"+$("#skillid").find("option").eq(k).val().split('-')[1]+"</option>");
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
                    var location_urls = window.location.href.substring(window.location.href.indexOf("cityid")).split("=");

                    html+="<option value='0' >不限</option>";

                    for(var i=0;i<data.length;i++){
                        if(i==0){
                            html+="<option value='"+data[i].id+"' selected>"+data[i].name+"</option>";
                        }else{
                            html+="<option value='"+data[i].id+"'>"+data[i].name+"</option>";
                        }

                    }
                }
                $(selectHtml).append($(html));
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

    //town
    $(":input[name=countyid]").on("change",function (e) {
        //createAddressHtml($(this).val(),$(":input[name=townid]"),$(":input[name=townid]"));
    });

    function getData(obj)
    {
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

    /**************edit*****************/

    // <input type="hidden" name="city-edit-id" value="{{$data->cityid}}">
    // <input type="hidden" name="county-edit-id" value="{{$data->countyid}}">
    // <input type="hidden" name="town-edit-id" value="{{$data->townid}}">

    if($(":input[name=id]").val()>0){

        var cityList = $(":input[name=cityid]").find("option");



        for(var i=0;i<cityList.length;i++){
            if($(":input[name=city-edit-id]").val() == $(cityList).eq(i).val()){
                $(cityList).eq(i).get(0).selected = 'selected';

                //select

                createAddressHtml($(cityList).eq(i).val(),$(":input[name=countyid]"),$(":input[name=countyid]"));

            }
        }

        var countyList = $(":input[name=countyid]").find("option");

        for(var j=0;j<countyList.length;j++){
            if($(":input[name=county-edit-id]").val() == $(countyList).eq(j).val()){
                $(countyList).eq(j).get(0).selected = 'selected';
                createAddressHtml($(countyList).eq(j).val(),$(":input[name=townid]"),$(":input[name=townid]"));
            }

        }
        var townList = $(":input[name=townid]").find("option");
        for(var i=0;i<townList.length;i++){
            if($(":input[name=town-edit-id]").val() == $(townList).eq(i).val()){
                $(townList).eq(i).get(0).selected = 'selected';

            }
        }

    }

    //专长处理
    $("#skillid").on("change",function(e){

        var temp = $(e.target).val()[0].split("-");

        var selecteds = $("#skillid_bak").find("option");
        var Skills = [];
        for(var i=0;i<selecteds.length;i++){
            Skills[$(selecteds).eq(i).val()] = $(selecteds).eq(i).val();
        }
        console.log(Skills);
        if(temp[0] && !Skills[temp[0]]){
            $("#skillid_bak").append("<option value='"+temp[0]+"'>"+temp[1]+"</option>");
        }else{

        }



    });

    $("#skillid_bak").on("change",function(){
        var hasSelects = $("#skillid_bak").find("option");
        for(var j=0;j<hasSelects.length;j++){
            if($(hasSelects).eq(j).val() == $(this).val()){
                $(hasSelects).eq(j).remove();
            }
        }
    });


    /**************edit*****************/



})