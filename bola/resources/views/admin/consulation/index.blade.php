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
                          <li>转诊申请记录管理/列表</li>
                          <li><div class="ait-search"><label><input type="search" name="username" value="{{ request()->get("username") }}" placeholder="病人名字" class="form-control input-xm" placeholder=""></label></div></li>
                          <li><div class="ait-search"><label><input type="search" name="mobile" value="{{ request()->get("mobile") }}" placeholder="病人电话" class="form-control input-xm" placeholder=""></label></div></li>


                          <li>
                              <div class="col-xs-3" style="width:200px!important;">


                                  <select class="form-control" required="" id="hospitalid" name="hospitalid" >
                                      <option value="">选择医生</option>
                                    @foreach($hospital as $item)

                                      <option value="{{$item->id}}" @if(request()->hospitalid == $item->id) selected @endif>{{$item->username}}</option>
                                    @endforeach
                                  </select>


                              </div>

                          </li>
                          <li>
                              <div class="col-xs-3" style="width:200px!important;">


                                  <select class="form-control" required="" id="status" name="status" >
                                      <option value="0">状态选择</option>
                                      <option value="3" @if(request()->status == 3) selected @endif>未处理</option>
                                      <option value="1" @if(request()->status == 1) selected @endif>已处理</option>
                                      <option value="2" @if(request()->status == 2) selected @endif>已取消</option>

                                  </select>


                              </div>

                          </li>
                          <!--
                          <li><small ><a href="{{route('hospital.create')}}" class="btn btn-info" >添加</a></small></li>-->
                          <li><small ><a  class="btn btn-info search" >搜索</a></small></li>
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
                              <th class="column-title" width="100px">病人名称 </th>
                              <th class="column-title" width="100px">病人电话 </th>

                              <th class="column-title" width="100px">提交医生 </th>
                              <th class="column-title" width="100px">医生电话 </th>
                              <th class="column-title" width="100px">分配医院</th>

                              <th class="column-title" width="200px">申请时间</th>
                              <th class="column-title" width="200px">分配时间</th>
                              <th class="column-title" width="100px">病例附件</th>
                              <th class="column-title" >病情描述</th>
                              <th class="column-title" >转诊要求 </th>
                              <th class="column-title" >状态</th>
                              <th class="column-title" >操作</th>
                          </tr>
                          </thead>

                          <tbody>

                          @foreach ($data as $news)
                              <tr class="even pointer">
                                  <td class="column-title" >{{$news->id}}</th>
                                  <td class="column-title" >{{$news->name}}</th>
                                  <td class="column-title" >{{$news->mobile}}</th>

                                  <td class="column-title">{{$news->pyhsician->username}}</th>
                                  <td class="column-title">{{$news->pyhsician->mobile}}</th>
                                  <td class="column-title" >{{$news->hospital->name}}</th>
                                  <td class="column-title" >{{$news->created_at}}</th>

                                  <td class="column-title" >{{$news->assign_time}}</th>

                                  <td class="column-title" >
                                  @if($news->case_illfile)
                                          <a href="{{$news->case_illfile}}" >下载</a>
                                  @endif
                                          没有附件

                                  </th>


                                  <td class="column-title" >{{str_limit($news->description,20)}}</th>
                                  <td class="column-title" >{{str_limit($news->transfer_desc,20)}}</th>
                                  <td class="column-title" >

                                      <div class="">
                                          <label>
                                              @if($news->status == 1)
                                                  已处理
                                              @elseif($news->status == 2)
                                                  已取消
                                              @else
                                                  待处理
                                              @endif
                                          </label>
                                      </div>

                                  </td>
                                  <td ><a href="{{route('consulation.edit',$news->id)}}" class="btn btn-success btn-sm">处理</a><!--<a class="delete btn btn-danger btn-sm" href="#" data-id="{{$news->id}}">移除</a>--></td>
                              </tr>
                          @endforeach


                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="page">
                  {!! $data->appends(['username'=>request()->username,'mobile'=>request()->mobile,'positionid'=>request()->positionid,'status'=>request()->status])->links() !!}
              </div>
          </div>
      </div>
  </div>
    @include("admin.layout.footerjs")
    <script src="{{URL::asset('js/admin/consulation.js')}}"></script>
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