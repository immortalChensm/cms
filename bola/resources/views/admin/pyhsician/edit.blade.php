@extends("admin.layout.main")
@section("content")

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
        <form method="post" action="{:U('Pyhsician/save')}" id="postform" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$data->id}}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="skill-edit-id" value="{{$data->skillid}}">

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">医生图片 <span class="required">*</span>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">医生名字</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="username" value="{{$data->username}}" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">所属医院</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name"  disabled  value="{{$data->hospital->name}}" required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">医院代码</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name"  disabled  value="{{$data->hospital_code}}" required="required" class="form-control col-md-7 col-xs-12">
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
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">职称</label>
                <div class="col-xs-3">
                    <select class="form-control" required="" name="positionid">
                        @foreach($position as $item)
                            <option value="{{$item->id}}" @if($data->positionid==$item->id) selected @endif>{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">手机号</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" value="{{$data->mobile}}" disabled required="required" class="form-control col-md-7 col-xs-12">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">个人简介</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                    <textarea class="form-control col-md-7 col-xs-12" name="introduction" style="min-height: 200px;" value="{{$data->introduction}}">{{$data->introduction}}</textarea>
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
          
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="reset" onclick="javascript:history.back();">取消</button>
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
<script src="{{URL::asset('js/admin/pyhsician.js')}}"></script>
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
            url : "{{url('admin/pyhsician/')}}/"+{{$data->id}},
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