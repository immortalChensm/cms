<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="后台管理系统" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>后台 </title>

    <!-- Bootstrap -->
    <link href="{{URL::asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{URL::asset('gentelella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{URL::asset('gentelella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{URL::asset('gentelella/vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{URL::asset('gentelella/build/css/custom.min.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('layer/layer.js')}}"></script>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ url('/admin/login') }}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <h1>后台管理系统</h1>
              <div>
                <input type="text" class="form-control" name="account" placeholder="account" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="password" required="" />
              </div>
              <div>
                 <input type="button" class="adminForm" id="adminForm" value="登  录" style="cursor: pointer;"></input>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>
              <div class="separator">
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> </h1>
                  <p></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script type="text/javascript">

    function login(){
        var self = $("form");
        var account = $('input[name=account]').val()
        var password = $('input[name=password]').val()
        var _token = $('input[name=_token]').val()
        $.ajax({
            type: 'POST',
            url: self.attr("action"),
            dataType: 'json',
            data: {_token:_token,account:account,password:password},
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
    $("#adminForm").click(function () {
       login();
    });
    document.onkeydown = function (event) {
        var e = event || window.event || arguments.callee.caller.arguments[0];
        if (e && e.keyCode == 13) { // enter 键
            login();
        }
    };
</script>
  </body>
</html>
