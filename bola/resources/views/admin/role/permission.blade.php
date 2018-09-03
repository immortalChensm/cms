@extends("admin.layout.main")
@section("content")
  <div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="width:100%;">
      <div class="col-md-6 col-sm-6 col-xs-12" style="width:100%;">
        <div class="x_panel" style="width:100%;">
          <div class="x_title">
            <h2>角色权限管理<small></h2>
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
          <div class="x_content" >
              <form method="post"  id="postform" >
                  {{csrf_field()}}
              @foreach($permissionS as $key=>$item)
              <div class="form-group" style="margin:10px 5px;">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">


                      <input type="checkbox"  class="js-switch all" @if(isset($item['select'])) checked="" value="on" @else value="off" @endif data-switchery="true" style="display: none;">

                      {{$key}}</label>

                  <div class="col-md-9 col-sm-9 col-xs-12">


                      <div class="" >

                          @foreach($item as $k=>$v)
                              @if(is_numeric($k))
                          <label style="margin:5px 10px;">

                              <input type="checkbox"  name="permission[{{$v['id']}}]" data-id="{{$v['id']}}" class="js-switch" @if($v['permission']==1) checked value="on" @else value="off" @endif />

                              {{$v['name']}}
                          </label>
                              @endif
                          @endforeach

                      </div>

                  </div>
              </div>
                  @endforeach

              </form>


          </div>
          <button class="btn btn-primary"  data-id="" onclick="history.back();">返回</button>
          <button class="btn btn-success" onclick="save()" data-id="">保存</button>
        </div>
      </div>
    </div>
  </div>
  @include("admin.layout.footerjs")
  <script type="text/javascript">

        $(".js-switch").on("click",function (e) {
            if($(this).val()=='on'){
                $(this).val("off");
            }else{
                $(this).val("on");
            }

        })

        var span_selectStyle = "background-color: rgb(38, 185, 154); border-color: rgb(38, 185, 154); box-shadow: rgb(38, 185, 154) 0px 0px 0px 11px inset; transition: border 0.4s, box-shadow 0.4s, background-color 1.2s;";
        var span_unselectStyle = "background-color: rgb(255, 255, 255); border-color: rgb(223, 223, 223); box-shadow: rgb(223, 223, 223) 0px 0px 0px 0px inset; transition: border 0.4s, box-shadow 0.4s;";
        var small_selectStyle = "left: 12px; transition: background-color 0.4s, left 0.2s; background-color: rgb(255, 255, 255);";
        var small_unselectStyle = "left: 0px; transition: background-color 0.4s, left 0.2s;";
        $(".all").on("click",function(e){


            //console.log($(this).next("span").get(0).style);
            if($(this).val()=='on'){
                $(this).val("off");
            }else{
                $(this).val("on");
            }

            //console.log($(this).parent().parent().find("input").length);
            if($(this).val()=='on'){
                for(var i=0;i<$(this).parent().parent().find("input").length;i++){
                    $(this).parent().parent().find("input").eq(i).val("off");
                    $(this).parent().parent().find("input").eq(i).removeAttr("checked");
                    $(this).parent().parent().find("input").eq(i).next("span").get(0).style = span_unselectStyle;
                    $(this).parent().parent().find("input").eq(i).next("span").eq(0).find("small").get(0).style = small_unselectStyle;

                }
            }else if($(this).val()=='off'){
                for(var i=0;i<$(this).parent().parent().find("input").length;i++){
                    $(this).parent().parent().find("input").eq(i).val("on");
                    $(this).parent().parent().find("input").eq(i).attr("checked");
                    $(this).parent().parent().find("input").eq(i).next("span").get(0).style = span_selectStyle;
                    $(this).parent().parent().find("input").eq(i).next("span").eq(0).find("small").get(0).style = small_selectStyle;


                }
            }
        });

        //all permission init status
        // var permission_init = $(".all");
        //
        // for(var i=0;i<permission_init.length;i++){
        //    // console.log($(permission_init).eq(i).parent().next("div").find("input").length);
        //
        //     var temp = $(permission_init).eq(i).parent().next("div").find("input");
        //     for(var j=0;j<temp.length;j++){
        //         if($(temp).eq(j).val() == 'on'){
        //             $(temp).eq(j).parent().parent().parent().prev().find("input").val("on");
        //             $(temp).eq(j).parent().parent().parent().prev().find("input").next("span").get(0).style = span_selectStyle;
        //             $(temp).eq(j).parent().parent().parent().prev().find("input").next("span").find("small").get(0).style = small_selectStyle;
        //         }
        //     }
        //     //$(permission_init).eq(i).val("off");
        //     console.log($(permission_init).eq(i).parent().find("span"));
        //     //$(permission_init).eq(i).next("span").get(0).style = span_unselectStyle;
        //     //$(permission_init).eq(i).next("span").find("small").get(0).style = small_unselectStyle;
        //
        // }

      $("#saveRole").click(function(){

          $.post("/admin/roles/2/permission",{'permissionIds':permissionIds,'_token':"{{csrf_token()}}"},function (data) {
              if(data.status==1){
                  layer.msg(data.message, {icon: 6},function(){
                      window.location.href = data.url;
                  });
              }else{
                  layer.msg(data.message, {icon: 5});
              }
          },'json');
          return false;
      });

      function save(){
          var permissionS = [];
          var p = $(".js-switch"); var obj = {};
          for(var i=0;i<p.length;i++){
              obj[$(p).eq(i).attr("data-id")] = $(p).eq(i).val();

          }

          $.ajax({
              type: 'POST',
              url: "/admin/roles/{{$current_role->id}}/permission",
              dataType: 'json',
              data: {
                     "_token":$(":input[name=_token]").val(),
                    "selectid":obj,
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