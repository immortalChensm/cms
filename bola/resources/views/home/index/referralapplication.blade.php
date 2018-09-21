@extends("home.public.main")
@section("title")
    转诊申请
@endsection
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('home/css/referralapplication.css')}}"/>
    <style>
        .patientt{
            margin-left: 355px;
            margin-top: 20px;
        }
        .patientt select{
            width: 300px;
            height: 30px;
            border-radius: 4px;
            border: solid 1px #e0e0e0;
            background-color:#ffffff;
            margin-left: 2px;
            padding-left: 8px;
            font-size: 16px;
            color: #999999;
            /* margin-top: 20px; */
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url({{ URL::asset('home/img/xiala1.png')}}) no-repeat center right 10px;
        }
        .patientt span{
            font-size: 18px;
        }
        .patientt a{
            color: red;
        }

        #btn{

            background-color: #971d25;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            display:inline-block;
            width: 200px;
            height: 40px;
            line-height: 40px;
            text-align: center;

        }
        a:hover {

            color: #ffffff;
            text-decoration: none;
        }
        /*.imgxa{
				width: 200px;
				height: 144px;
				position: relative;
				display: inline-block;
				margin-left: 5px;
			}
			.imgxaa{
				width: 200px;
				height: 144px;
				position: absolute;
				
			}
			.cl{
				position: absolute;
				z-index: 9;
				right: 0;
			}
			.uploadcase-sc{
				display: inline-block;
				width: 650px;
			}*/
			        .imgxa{
				width: 200px;
				height: 144px;
				position: relative;
				display: inline-block;
				margin-left: 5px;
				margin-top: 10px;
				float: left;
			}
			.imgxaa{
				width: 200px;
				height: 144px;
				position: absolute;
				
			}
			.imgwo{
				width: 120px;
				height: 144px;
				position: relative;
				display: inline-block;
				margin-left: 5px;
				float: left;
				margin-top: 10px;
			}
			.imgword{
				margin-top: 20px;
			}
			.cl{
				position: absolute;
				z-index: 9;
				right: 0;
			}
			.uploadcase-sc{
				display: inline-block;
				width: 650px;
			}
			.upload{
				float: left;
				position: relative;
			}
			.wjxx{
				margin-top: -1px;
				text-align: center;
				margin-bottom: 10px;
				width: 120px;
				position: absolute;
				overflow: hidden;
			}
    </style>
@endsection
@section("content")
    <div class="context">
        <div class="yltyy container">
            您现在的位置：<a href="/"> 首页</a> > 转诊申请
        </div>
        <form id="postform">
        <div class="shenqing container">
            <div class="patientname">
                <span>病人姓名:<a href="">*</a></span>
                <input type="text" placeholder="请输入病人姓名" name="name"/>
            </div>
            <div class="patienttel">
                <span>病人电话:<a href="">*</a></span>
                <input type="text" placeholder="请输入病人电话" name="mobile"/>
            </div>
            <div class="patientdescribe">
                <span>病情描述:<a href="">*</a></span>
                <textarea placeholder="请输入病情描述（150字以内）" name="description"></textarea>
            </div>
            <div class="patientt">
                <span>患者病情:<a href="">*</a></span>
                <select name="ill_desc" id="">
                    <option value="">请选择患者病情</option>
                    <option value="急">急</option>
                    <option value="危">危</option>
                    <option value="重">重</option>
                    <option value="一般">一般</option>
                </select>
            </div>
            <div class="patientt">
                <span>呼吸支持:<a href="">*</a></span>
                <select name="ill_breath" id="">
                    <option value="">请选择呼吸支持</option>
                    <option value="吸氧">吸氧</option>
                    <option value="无创">无创</option>
                    <option value="有创">有创</option>
                    <option value="ECMO">ECMO</option>
                </select>
            </div>
            <div class="patientt">
                <span>病房需求:<a href="">*</a></span>
                <select name="ill_room" id="">
                    <option value="">请选择病房需求</option>
                    <option value="RICU">RICU</option>
                    <option value="普通病区">普通病区</option>
                </select>
            </div>
            <div class="patientt">
                <span>转运需求:<a href="">*</a></span>
                <select name="ill_transfer" id="">
                    <option value="">请选择转运需求</option>
                    <option value="救护车">救护车</option>
                    <option value="直升机">直升机</option>
                    <option value="接诊">接诊</option>
                    <option value="送诊">送诊</option>
                </select>
            </div>
            <div class="patientt">
                <span>时间需求:<a href="">*</a></span>
                <select name="ill_ntime" id="">
                    <option value="">请选择时间需求</option>
                    <option value="8小时">8小时</option>
                    <option value="24小时">24小时</option>
                    <option value="72小时">72小时</option>
                </select>
            </div>
            <div class="uploadcase">
                <span class="uploadcasem">上传病历:可上传图片、PDF、Excel、word</span>
                <div class="uploadcase-sc">

                    <div id="filelist"></div>

                    <div id="container" style="float:left;height:90px;width:90px;">
                        <img  style="display: block;" src="{{ URL::asset('home/img/add.png')}}" alt="">
                        <span style="display: block;"id="pickfiles">点击添加文件</span>
                        <span style="display: block;">可上传图片、PDF、Excel、word</span>
                    </div>

                </div>
	                
            </div>
            <div class="sc">
                <a onclick="submitS()" id="btn">保存</a>
            </div>
        </div>
        </form>
    </div>

@endsection
@section("footerjs")
    <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="{{ URL::asset('home/plupload/js/plupload.full.min.js')}}"></script>

    <script src="{{ URL::asset('home/js/application.js')}}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">

            /***************************upload***********************************/




            var uploader = new plupload.Uploader({
                runtimes : 'html5,flash,silverlight,html4',
                browse_button : 'pickfiles', // you can pass an id...
                container: document.getElementById('container'), // ... or DOM Element itself
                url : '/upload',
                flash_swf_url : '{{ URL::asset('home/plupload/js/Moxie.swf')}}',
                silverlight_xap_url : '{{ URL::asset('home/plupload/js/Moxie.xap')}}',

                filters : {
                    max_file_size : '80mb',
                    mime_types: [
                        {title : "Image files", extensions : "jpg,gif,png"},
                        {title : "office file", extensions : "xlsx,doc,docx,pdf"}
                    ]
                },
                max_file_count:10,

                views: {
                    list: true,
                    thumbs: true, // Show thumbs
                    active: 'thumbs'
                },

                init: {
                    PostInit: function() {
                        document.getElementById('filelist').innerHTML = '';

                        // document.getElementById('uploadfiles').onclick = function() {
                        //     uploader.start();
                        //     return false;
                        // };
                    },

                    FilesAdded: function(up, files) {
                        plupload.each(files, function(file) {


                        });

                        if($("#filelist").find("div").length>11){
                            layer.msg('上传文件只支持10个',{time:1000});
                            return false;
                        }
                        uploader.start();
                    },

                    UploadProgress: function(up, file) {
                        //document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";

                        //layer.msg('正在上传'+file.percent+"%");
                        //console.log(file.percent);
                    },

                    FileUploaded: function(uploader,file,responseObject) {
                        //document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";

                        //layer.msg('正在上传'+file.percent+"%");
                        //console.log(file.percent);

                        var respose = (JSON.parse(responseObject.response));

                        if(respose.status == 1){
                            //document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
                            if(/xlsx/.test(respose.message.extension)){
                                var box = '<div class="imgwo" id="imgxa3">'+
                                    '<img class="imgword" src="{{ URL::asset('home/img/excel.png')}}"/>'+
                                    '<img class="cl" id="cl3" src="{{ URL::asset('home/img/cl.gif')}}"/>'+
                                        '<input type="hidden" name="image[]" value="'+respose.message.name+'">'+
                                    '<div class="wjxx">'+respose.message.sourcename+'</div>'+
                                    '</div>';
                            }

                            if(/doc/.test(respose.message.extension)){
                                var box = '<div class="imgwo" id="imgxa3">'+
                                    '<img class="imgword" src="{{ URL::asset('home/img/word.png')}}"/>'+
                                    '<img class="cl" id="cl3" src="{{ URL::asset('home/img/cl.gif')}}"/>'+
                                    '<input type="hidden" name="image[]" value="'+respose.message.name+'">'+
                                    '<div class="wjxx">'+respose.message.sourcename+'</div>'+
                                    '</div>';
                            }
                            if(/pdf/.test(respose.message.extension)){
                                var box = '<div class="imgwo" id="imgxa3">'+
                                    '<img class="imgword" src="{{ URL::asset('home/img/word.png')}}"/>'+
                                    '<img class="cl" id="cl3" src="{{ URL::asset('home/img/cl.gif')}}"/>'+
                                    '<input type="hidden" name="image[]" value="'+respose.message.name+'">'+
                                    '<div class="wjxx">'+respose.message.sourcename+'</div>'+
                                    '</div>';
                            }

                            if(/png|jpg|gif/.test(respose.message.extension)){



                                var box = '<div class="imgwo" id="imgxa3">'+
                                    '<img class="imgword" src="'+respose.message.name+'" style="width:90px;height:90px;"/>'+
                                    '<img class="cl" id="cl3" src="{{ URL::asset('home/img/cl.gif')}}"/>'+
                                    '<input type="hidden" name="image[]" value="'+respose.message.name+'">'+
                                    '<div class="wjxx">'+respose.message.sourcename+'</div>'+
                                    '</div>';
                            }

                            $("#filelist").append($(box));
                        }

                    },

                    Error: function(up, err) {
                        //document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));

                        if(err.code == '-600' && err.message == 'File size error.'){
                            layer.msg('上传文件不得超过80M',{time:1000});
                        }
                        if(err.code == '-601' && err.message == 'File extension error.'){
                            layer.msg('只能上传jpg,png,gif,xsls,pdf,word文件',{time:1000});
                        }
                        console.log(err);
                    }
                }
            });

            uploader.init();

            $(function(){
                $("#filelist").on("click",".cl",function (e) {
                    $(this).parent().remove();
                    console.log(e);
                })
            })


            /***************************upload***********************************/
		</script>
@endsection