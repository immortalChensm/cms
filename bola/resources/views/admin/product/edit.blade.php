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
        <form method="post" action="{:U('Hospital/save')}" id="postform" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="skill-edit-id" value="{{$data->skillid}}">
            <input type="hidden" name="province-edit-id" value="{{$data->provinceid}}">
            <input type="hidden" name="city-edit-id" value="{{$data->cityid}}">
            <input type="hidden" name="county-edit-id" value="{{$data->countyid}}">
            <input type="hidden" name="town-edit-id" value="{{$data->townid}}">



            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">医院图片 <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden" id="first-name" name="image"  required="required" class="form-control col-md-7 col-xs-12">
                    <input type="file" id="image">
                    @if($data->image)
                        <img src="{{request()->getSchemeAndHttpHost().$data->image}}" width="100" height="100">
                    @endif
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">医院名称</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="name" value="{{$data->name}}" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">医院代码</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="code" value="{{$data->code}}" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">医院等级</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" required="" name="grade">


                            <option value="" @if($data->grade == '') selected @endif>医院等级</option>

                        <option value="示范单位" @if($data->grade == '示范单位') selected @endif>示范单位</option>
                        <option value="优秀单位" @if($data->grade == '优秀单位') selected @endif>优秀单位</option>
                        <option value="达标单位" @if($data->grade == '达标单位') selected @endif>达标单位</option>
                        <option value="培育单位" @if($data->grade == '培育单位') selected @endif>培育单位</option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">PCCM等级</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select class="form-control" required="" name="pccm">


                        <option value="" @if($data->pccm == '') selected @endif>PCCM等级</option>

                        <option value="三甲"  @if($data->pccm == '三甲') selected @endif>三甲</option>
                        <option value="三乙"  @if($data->pccm == '三乙') selected @endif>三乙</option>
                        <option value="三丙"  @if($data->pccm == '三丙') selected @endif>三丙</option>

                        <option value="二甲"  @if($data->pccm == '二甲') selected @endif>二甲</option>
                        <option value="二乙"  @if($data->pccm == '二乙') selected @endif>二乙</option>
                        <option value="二丙"  @if($data->pccm == '二丙') selected @endif>二丙</option>

                        <option value="一甲"  @if($data->pccm == '一甲') selected @endif>一甲</option>
                        <option value="一乙"  @if($data->pccm == '一乙') selected @endif>一乙</option>
                        <option value="一丙"  @if($data->pccm == '一丙') selected @endif>一丙</option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">剩余普通床位</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="general_seat" value="{{$data->general_seat}}" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">剩余ICU床位</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="icu_seat" value="{{$data->icu_seat}}" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>



            <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">科室</label>
                <div class="col-xs-3">
                    <select class="form-control" required="" name="subjectid">
                        @foreach($subject as $item)
                            <option value="{{$item->id}}" @if($data->subjectid==$item->id) selected @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">专业特长</label>
                <div class="col-xs-3">
                    <select class="form-control" required="" id="skillid" name="skillid[]" multiple="multiple">
                        <option value="">专业特长</option>

                    </select>

                    <select class="form-control" required="" id="skillid_bak" name="skillid_bak[]" multiple="multiple">
                        <option value=""></option>

                    </select>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">床位数</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="bed_num" value="{{$data->bed_num}}" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">地址</label>
                <div class="col-xs-3" style="width:300px !important;">


                    <select class="form-control" required="" name="provinceid" >
                        @foreach($province as $item)
                            <option value="{{$item->id}}" @if($data->provinceid==$item->id)selected @endif>{{$item->name}}</option>
                        @endforeach
                    </select>


                </div>
                <div class="col-xs-3" style="width:300px!important;">


                    <select class="form-control" required="" name="cityid" >

                        <option value=""></option>

                    </select>


                </div>
                <div class="col-xs-3" style="width:300px!important;">


                    <select class="form-control" required="" name="countyid" >

                        <option value=""></option>

                    </select>


                </div>

                {{--<div class="col-xs-3"  style="width:300px!important;">--}}


                    {{--<select class="form-control" required="" name="townid">--}}

                        {{--<option value=""></option>--}}

                    {{--</select>--}}


                {{--</div>--}}

            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">街道社区</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="street" value="{{$data->street}}" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">详细地址</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="address" value="{{$data->address}}" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">状态</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="ait-switch">
                        <label>
                            @if($data->status == 1)
                                <input type="checkbox" name="status" class="js-switch" checked />
                            @else
                                <input type="checkbox" name="status" class="js-switch"  />
                            @endif
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">是否推荐</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="ait-switch">
                        <label>
                            @if($data->recommend == 1)
                                <input type="checkbox" name="recommend" class="js-switch" checked />
                            @else
                                <input type="checkbox" name="recommend" class="js-switch"  />
                            @endif
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">医院管理员</label>
                <div class="col-xs-3" style="width:300px !important;">


                    <select class="form-control" required="" name="hospital_adminid" >
                        <option value="">选择管理员</option>
                        @foreach($physician as $item)
                            <option value="{{$item->id}}" @if($data->hospital_adminid == $item->id) selected @endif>{{$item->username}}</option>
                        @endforeach
                    </select>


                </div>
            </div>


            <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="reset" onclick="javascript:history.back();">返回</button>
              <button type="button" onclick="save()" class="btn btn-success">提交</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
</div>
   @include("admin.layout.footerjs")
<script src="{{URL::asset('js/admin/hospital.js')}}"></script>
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

       
    function save(){
        $.ajax({
            type: 'POST',
            url : "{{url('admin/hospital/')}}/"+{{$data->id}},
            dataType: 'json',
            data: $('#postform').serializeArray(),
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