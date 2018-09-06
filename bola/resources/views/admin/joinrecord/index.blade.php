@extends("admin.layout.main")
@section("content")
    <style type="text/css">
        .search-header{
            list-style: none;
            line-height: 200%;
            font-size:18px;
        }
        .search-header li{
            float: left;
            margin:1px 10px;
        }
        .search-header li div label{
            font-size:18px;
        }

    </style>
  <div class="right_col" role="main">
    <!-- top tiles -->
      <div class="col-md-12 col-sm-12 col-xs-12">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="x_panel">
              <div class="x_title">
                  <h2>
                      <ul class="search-header">
                          <li>医联体申请/列表</li>
                          {{--<li><small ><a  class="btn btn-info search" >搜索</a></small></li>--}}
                      </ul>

                  </h2>
                  <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                  </ul>
                  <div class="clearfix"></div>
              </div>

              <div class="x_content">
                  <div class="table-responsive">
                      <table class="table table-striped ait-table bulk_action" style="width:100% !important;">
                          <thead>
                          <tr class="headings">
                              <th class="column-title" >#</th>
                              <th class="column-title" width="100px">姓名 </th>
                              <th class="column-title" width="100px">手机号 </th>

                              <th class="column-title" width="100px">申请凭证 </th>
                              <th class="column-title" width="100px">状态</th>
                              <th class="column-title" >操作</th>
                          </tr>
                          </thead>

                          <tbody>
                                @foreach($join as $item)
                                    <tr>
                                    <td class="column-title" >{{$item->id}}</td>
                                    <td class="column-title" >{{$item->username}}</td>
                                    <td class="column-title" >{{$item->mobile}}</td>
                                    <td class="column-title" >
                                        @if($item->cert)
                                            <a href="{{$item->cert}}" class="btn btn-info btn-sm">下载</a>
                                            @else
                                            没有附件
                                            @endif


                                    </td>
                                    <td class="column-title" >
                                        @if($item->status == 0)
                                            待处理
                                            @elseif($item->status == 1)
                                            已处理
                                            @elseif($item->status == 2)
                                            已取消
                                            @endif


                                    </td>
                                    <td class="column-title" ><a href="{{route('hospitalapp.edit',$item->id)}}" class="btn btn-success btn-sm">处理</a></td>
                                    </tr>
                                @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="page">
                    {{$join->links()}}
              </div>
          </div>
      </div>
  </div>
    @include("admin.layout.footerjs")
    <script type="text/javascript">
        //index page



            $(".status,.recommend").on("click",function(){
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                var type = "status";
                if($(this).hasClass("recommend")){
                    type = "recommend";
                }
                $.post("{{url('admin/pyhsician/status')}}",{'id':id,'type':type,'status':status,'_token':"{{csrf_token()}}"},function (data) {
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
                    $.post("{{url('admin/pyhsician/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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