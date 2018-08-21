@extends("admin.layout.main")
@section("content")
  <div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="width:100%;">
      <div class="col-md-6 col-sm-6 col-xs-12" style="width:100%;">
        <div class="x_panel" style="width:100%;">
          <div class="x_title">
            <h2>管理员管理/管理员列表<small><a href="{{route('admins.create')}}" class="btn btn-info" >添加</a></small></h2>
            <ul class="nav navbar-right panel_toolbox" style="display:none;">
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

            <table class="table" width="100%">
              <thead>
              <tr>
                <th>账号</th>

                <th>创建时间</th>
                <th>状态</th>
                <th>操作</th>
              </tr>
              </thead>
              <tbody>
                 @foreach ($data as $admins)
              <tr>
                <td>{{$admins->account}}</td>
             
                <td>{{$admins->created_at}}</td>
                <td>
                    @if ($admins->status == 0)
                  <button type="button" class="btn btn-round btn-danger status" data-id="{{$admins->id}}" data-status="1">启用</button>
                    @else 
                  <button type="button"  class="btn btn-primary status" data-id="{{$admins->id}}" data-status="0" >停用</button>
                    @endif
                </td>
                <td><a href="{{route('admins.edit',$admins->id)}}" class="btn btn-default">编辑</a><a class="delete" href="#" data-id="{{$admins->id}}">移除</a> <a  href="/admin/admins/{{$admins->id}}/role" class="btn btn-default" >角色管理</a></td>
              </tr>
               @endforeach
              </tbody>
            </table>
             <div class="page">
                {!! $data->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include("admin.layout.footerjs")
    <script type="text/javascript">
            $(".status").click(function(){
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                $.post("{{url('admin/admins/status')}}",{'id':id,'status':status,'_token':"{{csrf_token()}}"},function (data) {
                    if(data.status==1){
                        layer.msg(data.message, {icon: 6},function(){
                            window.location.reload();
                        });
                    }else{
                        layer.msg(data.message, {icon: 5});
                    }
                },'json');
                return false;
            });
        </script>

        <script>
            //删除
            $('.delete').click(function(){
                var id = $(this).attr('data-id');
                layer.confirm('您确定要删除吗？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    $.post("{{url('admin/admins/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                        if(data.status==1){
                            layer.msg(data.message, {icon: 6},function(){
                                window.location.reload();
                            });
                        }else{
                            layer.msg(data.message, {icon: 5});
                        }
                    },'json');
                }, function(){

                });
                return false;
            })
            
        </script>
  </div>

@endsection