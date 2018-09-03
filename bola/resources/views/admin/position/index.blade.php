@extends("admin.layout.main")
@section("content")
  <div class="right_col" role="main">
    <!-- top tiles -->
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                  <h2>分组管理/职称列表<small><a href="{{route('position.create')}}" class="btn btn-info" >添加</a></small></h2>
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
                      <table class="table table-striped ait-table bulk_action">
                          <thead>
                          <tr class="headings">
                              <th class="column-title" width="10%">#</th>
                              <th class="column-title" width="20%">职称名称 </th>

                              <th class="column-title" width="20%">状态 </th>
                              <th class="column-title" width="20%">操作 </th>
                          </tr>
                          </thead>

                          <tbody>

                          @foreach ($data as $position)
                              <tr class="even pointer">
                                  <td class=" ">{{$position->id}}</th>
                                  <td class=" ">{{$position->title}}</th>

                                  <td>
                                      {{--@if ($position->status == 0)--}}
                                          {{--<button type="button" class="btn btn-round btn-danger status" data-id="{{$position->id}}" data-status="1">启用</button>--}}
                                      {{--@else--}}
                                          {{--<button type="button"  class="btn btn-primary status" data-id="{{$position->id}}" data-status="0" >停用</button>--}}
                                      {{--@endif--}}

                                          <div class="">
                                              <label>
                                                  @if ($position->status == 1)
                                                      <input type="checkbox" class="js-switch status" data-id="{{$position->id}}" data-status="1" checked />
                                                  @else
                                                      <input type="checkbox" class="js-switch status" data-id="{{$position->id}}" data-status="0"  />
                                                  @endif
                                              </label>
                                          </div>

                                  </td>
                                  <td><a href="{{route('position.edit',$position->id)}}" class="btn btn-success btn-sm">编辑</a><a class="delete btn btn-danger btn-sm" href="#" data-id="{{$position->id}}">移除</a></td>
                              </tr>
                          @endforeach


                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @include("admin.layout.footerjs")
    <script type="text/javascript">


            $(".right_col").height($(".left_col").height());

            $(".status").click(function(){
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                $.post("{{url('admin/position/status')}}",{'id':id,'status':status,'_token':"{{csrf_token()}}"},function (data) {
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
                    $.post("{{url('admin/position/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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