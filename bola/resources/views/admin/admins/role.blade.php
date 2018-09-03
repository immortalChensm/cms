@extends("admin.layout.main")
@section("content")
  <div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="width:100%;">
      <div class="col-md-6 col-sm-6 col-xs-12" style="width:100%;">
        <div class="x_panel" style="width:100%;">
          <div class="x_title">
            <h2>用户角色管理<small></h2>
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
              {{csrf_field()}}
              @foreach($allRoles as $key=>$item)
                  <label style="margin:5px 10px;">
                        <input type="checkbox"  name="roleid[{{$key}}]" @if($item['status']==1) checked value="on" @else value="off" @endif data-id="{{$key}}" class="js-switch"/>{{$item['name']}}
                  </label>
                @endforeach

          </div>
          <button class="btn btn-primary" onclick="history.back();" >返回</button>
          <button class="btn btn-success" onclick="save()" data-id="{{$user->id}}">保存</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
      $(function () {
          $(".js-switch").on("click",function (e) {
              if($(this).val()=='on'){
                  $(this).val("off");
              }else{
                  $(this).val("on");
              }

          })
      })

      $("#saveRole").click(function(){

          var roleIds = [];

          for(var i=0;i<$(".icheckbox_flat-green").length;i++){

              console.log($(".icheckbox_flat-green").get(i));
              if($($(".icheckbox_flat-green").get(i)).hasClass("checked")){
                  roleIds.push($($(".icheckbox_flat-green").get(i)).find("input").val());
              }
          }
          $.post("/admin/admins/{{$user->id}}/role",{'roleids':roleIds,'status':status,'_token':"{{csrf_token()}}"},function (data) {
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
              url: "/admin/admins/{{$user->id}}/role",
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
  @include("admin.layout.footerjs")


@endsection