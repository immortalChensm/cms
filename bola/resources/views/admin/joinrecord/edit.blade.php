@extends("admin.layout.main")
@section("content")
<script type="text/javascript" charset="utf-8" src="{{URL::asset('plugins/Ueditor/ueditor.config.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{URL::asset('plugins/Ueditor/ueditor.all.min.js')}}"> </script>
<script type="text/javascript" charset="utf-8" src="{{URL::asset('plugins/Ueditor/lang/zh-cn/zh-cn.js')}}"></script>
<script type="text/javascript">
var url="{:url('Uploadify/index',array('savepath'=>'goods'))}";
var url="{{route('upload.config')}}";
var ue = UE.getEditor('content',{
    serverUrl :url,
    zIndex: 999,
    initialFrameWidth: "100%", //初化宽度
    initialFrameHeight: 300, //初化高度            
    focus: false, //初始化时，是否让编辑器获得焦点true或false
    maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
    pasteplain:false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
    autoHeightEnabled: true
});
</script>
  <div class="right_col" role="main">
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>编辑</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Settings 1</a>
              </li>
              <li><a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form method="post" action="{:U('hospitalapp/save')}" id="postform" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">姓名</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="username" value="{{$data->username}}"disabled required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">手机号</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name"  disabled  value="{{$data->mobile}}" disabled required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">申请时间</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" value="{{$data->created_at}}" disabled required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>



            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">附件</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    @if($data->cert)
                    <a href="{{$data->cert}}"></a>
                        @else
                        没有附件
                        @endif
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">状态</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="ait-switch">
                        <label>
                            @if($data->status == 1)
                                已处理
                                @elseif($data->status == 2)
                                已取消
                            @else
                                待处理
                            @endif
                        </label>
                    </div>
                </div>
            </div>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="reset" onclick="javascript:history.back();">返回</button>
              <button type="button" onclick="save(this)" data-type="save" class="btn btn-success">同意申请</button>
                <button type="button" onclick="save(this)" data-type="cancel" class="btn btn-success">取消申请</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
</div>
   @include("admin.layout.footerjs")

   <script type="text/javascript">

       uploadpic({
           element:$("#image"),
           getbloburl:function(blobURL){
               $("#image").parent().find("img").remove();
               $("#image").parent().append("<img src='"+blobURL+"' style='width:100px;height:100px;'>");
           },
           getbase64:function (base_data) {
               $("#image").parent().append(function (e) {
                   $("#image").parent().find(":input[name=image]").remove();
                   return "<input type='hidden' name='image' value='"+base_data+"'/>";
               });

           }
       });

       
    function save(btn){
        $.ajax({
            type: 'PATCH',
            url : "{{url('admin/hospitalapp/')}}/"+{{$data->id}},
            dataType: 'json',
            data: {
                id:$(":input[name=id]").val(),
                type:$(btn).attr("data-type"),
                _token:"{{csrf_token()}}"
            },
            success: function(data){
                if(data.status==1){
                    layer.msg(data.message);
                      setTimeout(function(){//两秒后跳转
                        window.location.href = data.url;
                        },1000);                  
                }else{
                    alert(data.message);
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
                        layer.msg('服务器连接失败',{time:1000});
                        return ;
                    }
                }
        });
        return false;
        function success(data) {
            if (data.status == 0) {
                alert(data.message);
            } else {
                window.location.href = data.url;
            }
        };
    }


    </script>
@endsection