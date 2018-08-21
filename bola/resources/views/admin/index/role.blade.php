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


              <p style="padding: 5px;" id="roleList">
              @foreach($allroles as $role)
              <div class="icheckbox_flat-green @if($roles->contains($role))checked @endif" style="position: relative;">
                  <input type="checkbox" @if($roles->contains($role))checked @endif name="roles[]" id="hobby1" value="{{$role->id}}" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> {{$role->name}}--{{$role->description}}
              <br>
              <br>


                @endforeach
              </p>

          </div>
          <button class="btn btn-primary" id="saveRole" data-id="{{$user->id}}">保存</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
      $(function () {
          $(".icheckbox_flat-green").on("click",function (e) {

              if($(this).hasClass("checked")){
                  $(this).removeClass("checked");
                  $(this).find("input").removeAttr("checked");
              }else{
                  $(this).addClass("checked");
                  $(this).find("input").attr("checked");
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

  </script>
  @include("admin.layout.footerjs")


@endsection