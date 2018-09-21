@extends("home.public.main")
@section("title")
    申请加入医联体
@endsection
@section("css")
    <style type="text/css">
        .context{
            width: 100%;
            height: 770px;
            background-color: #f8f8f8;

        }
        .shenqing{
            height: 500px;
            background-color: #ffffff;
            margin-top: 30px;
        }
        .shenqing input::-webkit-input-placeholder{
            color: #999999;
        }
        .shenqing textarea::-webkit-input-placeholder{
            color: #999999;

        }
        .patientname{
            margin-left: 390px;
            margin-top: 50px;
        }
        .patientname span{
            font-size: 18px;
        }
        .patientname a{
            color: red;
        }
        .patientname input{
            font-size: 16px;
            width: 300px;
            height: 30px;
            border-radius: 4px;
            border: solid 1px #e0e0e0;
            margin-left: 5px;
            padding-left: 10px;
        }
        .patienttel{
            margin-left: 373px;
            margin-top: 30px;
        }
        .patienttel span{
            font-size: 18px;
        }
        .patienttel a{
            color: red;
        }
        .patienttel input{
            font-size: 16px;
            width: 300px;
            height: 30px;
            border-radius: 4px;
            border: solid 1px #e0e0e0;
            margin-left: 5px;
            padding-left: 10px;
        }

        .uploadcase{
            margin-left: 356px;
            margin-top: 30px;
            z-index: -1;
        }
        .uploadcasem{
            font-size: 18px;
            vertical-align: top;
        }
        .uploadcase a{
            color: red;
            vertical-align: top;
        }
        .uploadcase input{
            font-size: 16px;
            width: 200px;
            height: 140px;
            opacity: 0;
            cursor: pointer;
            z-index: 999;
        }
        .upload{
            width: 200px;
            height: 140px;
            background-color: #f8f8f8;
            border-radius: 4px;
            display: inline-block;
            margin-left: 12px;
            position: relative;
            cursor: pointer;
            z-index: 0;
        }
        .upload img{
            left: 85px;
            position: absolute;
            top: 22px;
            z-index: 1;
        }
        .addpicture{
            font-size: 14px;
            color: #666666;
            position: absolute;
            width: 84px;
            left: 58px;
            top: 65px;
            z-index: 1;
            white-space : nowrap
        }
        .addjieshao{
            position: absolute;
            font-size: 12px;
            color: #999999;
            top: 88px;
            left: 12px;
            z-index: 1;
            white-space : nowrap
        }
        .sc{
            margin-left: 500px;
            margin-top: 50px;
        }
        .sc button{
            width: 200px;
            height: 40px;
            background-color: #971d25;
            border-radius: 4px;
            font-size: 16px;
            color: #ffffff;
            border: 0;
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
			}
			.upload{
				position: absolute;
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
            您现在的位置：<a href="/"> 首页</a> > 申请加入医联体
        </div>
        <form id="postform">
        <div class="shenqing container">
            <div class="patientname">
                <span>姓名:<a href="">*</a></span>
                <input type="text" placeholder="请输入姓名" name="username"/>
            </div>
            <div class="patienttel">
                <span>手机号:<a href="">*</a></span>
                <input type="text" placeholder="请输入手机号" name="mobile"/>
            </div>

            <div class="uploadcase">
                <span class="uploadcasem">申请凭证:</span>


                <div id="filelist"></div>

                <div id="container" style="float:left;height:90px;width:90px;">
                    <img  style="display: block;" src="{{ URL::asset('home/img/add.png')}}" alt="">
                    <span style="display: block;"id="pickfiles">点击添加文件</span>
                    <span style="display: block;">可上传图片、PDF、Excel、word</span>
                </div>


            </div>
            <div class="sc">
                <a onclick="save('hospital')" id="btn">上传</a>
            </div>
        </div>
        </form>
    </div>
@endsection
@section("footerjs")
    <script src="{{request()->getSchemeAndHttpHost()}}/layer/layer.js" type="text/javascript" charset="utf-8"></script>
    <script src="{{ URL::asset('home/js/joinHospital.js')}}" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="{{ URL::asset('home/plupload/js/plupload.full.min.js')}}"></script>
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