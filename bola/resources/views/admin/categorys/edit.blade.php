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
        <form method="post" action="{:U('Categorys/save')}" id="postform" data-parsley-validate class="form-horizontal form-label-left">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$category->id}}">
            {{ method_field('PUT') }}

            {{--<div class="form-group">--}}
                {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">科室 <span class="required">*</span>--}}
                {{--</label>--}}
                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}

                    {{--<select  name="parent_id" style="width:300px;">--}}
                        {{--<option value="0">--}}
                            {{--科室--}}
                        {{--</option>--}}
                        {{--@foreach($categorys as $item)--}}

                            {{--<option value="{{$item->id}}" @if($category->parent_id==$item->id) selected @endif>--}}
                                {{--{{str_repeat('----',$item->level)}}--}}
                                {{--{{$item->name}}--}}
                            {{--</option>--}}

                        {{--@endforeach--}}
                    {{--</select>--}}

                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="form-group">--}}
                {{--<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">科室</label>--}}
                {{--<div class="col-xs-3">--}}

                    {{--<select class="form-control" name="parent_id" required="">--}}
                        {{--<option value="0">--}}
                            {{--科室--}}
                        {{--</option>--}}
                        {{--@foreach($categorys as $item)--}}

                            {{--<option value="{{$item->id}}" @if($category->parent_id==$item->id) selected @endif>--}}
                                {{--{{str_repeat('----',$item->level)}}--}}
                                {{--{{$item->name}}--}}
                            {{--</option>--}}

                        {{--@endforeach--}}
                    {{--</select>--}}

                {{--</div>--}}
            {{--</div>--}}


            <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">名称 <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" name="name" value="{{$category->name}}" required="required" class="form-control col-md-7 col-xs-12">
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
   <script type="text/javascript">
    function save(){
        $.ajax({
            type: 'POST',
            url: "{{url('admin/categorys/')}}/"+{{$category->id}},
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
                        //console.log(data.status); return false;
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