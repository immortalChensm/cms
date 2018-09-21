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
          <div class="x_panel">
              <div class="x_title">
                  {{--<h2>教学培训管理/列表<small><a href="{{route('train.create')}}" class="btn btn-info" >添加</a></small></h2>--}}
                  <h2>
                      <ul class="search-header">
                          <li>教学培训管理/列表</li>
                          <li><div class="ait-search"><label><input type="search" name="title" value="{{ request()->get("title") }}" placeholder="标题" class="form-control input-xm" placeholder=""></label></div></li>

                          <li><small ><a  class="btn btn-info search" data-url="/admin/train">搜索</a></small></li>
                          <li><small ><a href="{{route('train.create')}}" class="btn btn-info" >添加</a></small></li>
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
                      <table class="table table-striped ait-table bulk_action">
                          <thead>
                          <tr class="headings">
                              <th class="column-title" width="10%">#</th>
                              <th class="column-title" width="20%">标题 </th>

                              <th class="column-title" width="20%">状态 </th>
                              <th class="column-title" width="20%">操作 </th>
                          </tr>
                          </thead>

                          <tbody>

                          @foreach ($data as $key=>$article)
                              <tr class="even pointer">
                                  <td class=" ">{{$key+1}}</th>
                                  <td class=" ">{{$article->title}}</th>

                                  <td class="">

                                      <div class="">
                                          <label>
                                              @if($article->status==1)
                                              <input type="checkbox" class="js-switch status"   checked data-id="{{$article->id}}" data-status="0" />
                                                  @else
                                                  <input type="checkbox" class="js-switch status"   data-id="{{$article->id}}" data-status="1" />
                                                  @endif
                                          </label>
                                      </div>

                                  </td>
                                  <td><a href="train/record/{{$article->id}}" class="btn btn-success btn-sm">培训申请记录</a><a href="{{route('train.edit',$article->id)}}" class="btn btn-success btn-sm">编辑</a><a class="delete btn btn-danger btn-sm" href="#" data-id="{{$article->id}}">移除</a></td>
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
  <script src="{{URL::asset('js/admin/article.js')}}"></script>
    <script type="text/javascript">


            $(".status").on("click",function(){
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');


                $.post("{{url('admin/train/status')}}",{'id':id,'status':status,'_token':"{{csrf_token()}}"},function (data) {
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
                    $.post("{{url('admin/train/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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