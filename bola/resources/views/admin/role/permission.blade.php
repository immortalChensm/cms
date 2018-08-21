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


              {{--<p style="padding: 5px;" id="roleList">--}}
              {{--@foreach($allpermission as $permission)--}}
              {{--<div class="icheckbox_flat-green @if($permissions->contains($permission))checked @endif" style="position: relative;">--}}
                  {{--<input type="checkbox" @if($permissions->contains($permission))checked @endif name="roles[]" id="hobby1" value="{{$permission->id}}" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> {{$permission->name}}--{{$permission->description}}--}}
              {{--<br>--}}
              {{--<br>--}}


                {{--@endforeach--}}
              {{--</p>--}}


              <p style="padding: 5px;" id="roleList">
              @php
                    foreach($temp as $item=>$value){

                            $key  = explode("=",$item);
                            $name = $key[1];
                            echo '<div class="icheckbox_flat-green" data="permission-all" style="position: relative;">


                    <input type="checkbox" name="roles[]"   data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> '.$name.'


                    ';
                        echo "<div style='position: relative;left:30px;'>";
                        foreach($value as $k=>$v){
                            $tempa  = explode("=",$v);
                            $p_name = $tempa[0];
                            $p_id   = $tempa[2];
                            if(isset($permissionsArr[$p_id])){
                                echo '<div class="icheckbox_flat-green checked " style="position: relative;left:px;">';
                            }else{

                                echo '<div class="icheckbox_flat-green  " style="position: relative;left:px;">';
                            }



                             echo '<input type="checkbox" name="roles[]"   value="'.$p_id.'" data-parsley-mincheck="2" required="" class="flat" data-parsley-multiple="hobbies" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> '.$p_name.'
                             ';
                        }
                        echo "</div>";

                    }



              @endphp
              </p>

          </div>
          <button class="btn btn-primary" id="saveRole" data-id="{{$roleinfo->id}}">保存</button>
        </div>
      </div>
    </div>
  </div>
  @include("admin.layout.footerjs")
  <script type="text/javascript">

          $(".icheckbox_flat-green").on("click",function (e) {

              if($(this).attr("data")=="permission-all"){


                  if($(this).hasClass("checked")){
                      $(this).removeClass("checked");
                      $(this).next("input").removeAttr("checked");
                  }else{
                      $(this).addClass("checked");
                      $(this).next("input").attr("checked");
                  }



                  var nextdiv = $(this).next("div").find("div");

                  for(var i=0;i<nextdiv.length;i++){
                      if($(this).hasClass("checked")){
                          console.log(nextdiv[i]);
                          $(nextdiv[i]).addClass("checked");
                          $(nextdiv[i]).find("input").attr("checked");
                      }else{
                          $(nextdiv[i]).removeClass("checked");
                          $(nextdiv[i]).find("input").removeAttr("checked");
                      }
                  }
              }else{
                  if($(this).hasClass("checked")){
                      $(this).removeClass("checked");
                      $(this).parent().find("input").removeAttr("checked");

                      var checkStatus = [];
                      var nextdiv = $(this).parent().find("div");
                      for(var i=0;i<nextdiv.length;i++){
                          if($(nextdiv[i]).hasClass("checked")){
                             ;
                          }else{
                              checkStatus.push($(nextdiv[i]));
                          }
                      }
                      if(nextdiv.length!=checkStatus.length){
                          $(this).parent().prev("div").removeClass("checked");

                      }else{
                          $(this).parent().prev("div").addClass("checked");
                      }


                  }else{
                      $(this).addClass("checked");
                      $(this).parent().find("input").attr("checked");

                      //移除所有
                      var checkStatus = [];
                      var nextdiv = $(this).parent().find("div");
                     for(var i=0;i<nextdiv.length;i++){
                         if($(nextdiv[i]).hasClass("checked")){
                             checkStatus.push($(nextdiv[i]));
                         }
                     }
                      if(nextdiv.length==checkStatus.length){
                          $(this).parent().prev("div").addClass("checked");

                      }else{
                          $(this).parent().prev("div").removeClass("checked");
                      }

                  }
              }

          })


      $("#saveRole").click(function(){

          var permissionIds = [];

          for(var i=0;i<$(".icheckbox_flat-green").length;i++){

              console.log($(".icheckbox_flat-green").get(i));
              if($($(".icheckbox_flat-green").get(i)).hasClass("checked")){
                  permissionIds.push($($(".icheckbox_flat-green").get(i)).find("input").val());
              }
          }
          $.post("/admin/roles/{{$roleinfo->id}}/permission",{'permissionIds':permissionIds,'_token':"{{csrf_token()}}"},function (data) {
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



@endsection