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
                          <li>医院管理/列表</li>
                          <li><div class="ait-search"><label><input type="search" name="hospital-name" value="{{ request()->get("hospitalname") }}" placeholder="医院名称" class="form-control input-xm" placeholder=""></label></div></li>
                          <li>
                              <div class="col-xs-3" style="width:200px!important;">


                                  <select class="form-control" required="" name="subjectid" >
                                      <option value="">选择科室</option>
                                        @foreach($subject as $item)
                                          <option value="{{$item->id}}" @if(request()->subjectid==$item->id) selected @endif>{{$item->name}}</option>

                                        @endforeach
                                  </select>


                              </div>

                          </li>
                          <li>
                              <div class="col-xs-3" style="width:200px!important;">


                                  <select class="form-control" required="" id="skillid" name="skillid" >

                                      <option value="">选择专业特长</option>

                                  </select>


                              </div>

                          </li>

                          <li>
                              <div class="col-xs-3" style="width:200px!important;">


                                  <select class="form-control" required="" name="provinceid" >
                                      @foreach($province as $item)
                                          <option value="{{$item->id}}">{{$item->name}}</option>
                                      @endforeach
                                  </select>


                              </div>

                          </li>

                          <li>
                              <div class="col-xs-3" style="width:200px!important;">


                                  <select class="form-control" required="" name="cityid" >

                                      <option value=""></option>

                                  </select>


                              </div>

                          </li>

                          <li>
                              <div class="col-xs-3" style="width:200px!important;">


                                  <select class="form-control" required="" name="countyid" >

                                      <option value=""></option>

                                  </select>


                              </div>

                          </li>

                          <li><small ><a href="{{route('hospital.create')}}" class="btn btn-info" >添加</a></small></li>
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
                      <table class="table table-striped ait-table bulk_action">
                          <thead>
                          <tr class="headings">
                              <th class="column-title">#</th>
                              <th class="column-title">医院图片 </th>
                              <th class="column-title">医院名称 </th>
                              <th class="column-title">医院代码 </th>
                              <th class="column-title">科室</th>
                              <th class="column-title">专业特长</th>
                              <th class="column-title" >床位数</th>
                              <th class="column-title">医生数</th>
                              <th class="column-title" >推荐</th>

                              <th class="column-title" >状态</th>
                              <th class="column-title" >操作</th>
                          </tr>
                          </thead>

                          <tbody>

                          @foreach ($data as $news)
                              <tr class="even pointer">
                                  <td class="column-title" >{{$news->id}}</th>
                                  <td class="column-title" >
                                  <img src="{{request()->getSchemeAndHttpHost().$news->image}}" class="img img-responsive" style="width:100px;"/>

                                  </th>
                                  <td class="column-title" >{{$news->name}}</th>
                                  <td class="column-title" >{{$news->code}}</th>
                                  <td class="column-title" >{{$news->subject->name}}</th>
                                  <td class="column-title" >
                                  @foreach($news->skillitem as $item)
                                          {{$item['name']}}
                                          @endforeach
                                  </th>
                                  <td class="column-title" >{{$news->bed_num}}</th>
                                  <td class="column-title" >{{$news->pyhsician_num}}</th>
                                  {{--<td class="column-title" width="20%">{{$news->province->name.$news->city->name.$news->county->name.$news->address}}</th>--}}
                                  <td class="column-title" >

                                      <div class="">
                                          <label>
                                              @if($news->recommend==1)
                                                  <input type="checkbox" class="js-switch recommend"   checked data-id="{{$news->id}}" data-status="0" />
                                              @else
                                                  <input type="checkbox" class="js-switch recommend"   data-id="{{$news->id}}" data-status="1" />
                                              @endif
                                          </label>
                                      </div>

                                  </td>
                                  <td class="column-title" >

                                      <div class="">
                                          <label>
                                              @if($news->status==1)
                                                  <input type="checkbox" class="js-switch status"   checked data-id="{{$news->id}}" data-status="0" />
                                              @else
                                                  <input type="checkbox" class="js-switch status"   data-id="{{$news->id}}" data-status="1" />
                                              @endif
                                          </label>
                                      </div>

                                  </td>

                                    <td ><a href="{{route('hospital.edit',$news->id)}}" class="btn btn-success btn-sm">编辑</a><a class="delete btn btn-danger btn-sm" href="#" data-id="{{$news->id}}">移除</a></td>

                              </tr>
                          @endforeach


                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="page">
                  {!! $data->appends(['hospitalname'=>request()->hospitalname,'subjectid'=>request()->subjectid,'skillid'=>request()->skillid])->links() !!}
              </div>
          </div>
      </div>
  </div>
    @include("admin.layout.footerjs")
    <script src="{{URL::asset('js/admin/hospital.js')}}"></script>
    <script type="text/javascript">
        //index page



            $(".status,.recommend").on("click",function(){
                var id = $(this).attr('data-id');
                var status = $(this).attr('data-status');
                var type = "status";
                if($(this).hasClass("recommend")){
                    type = "recommend";
                }
                $.post("{{url('admin/hospital/status')}}",{'id':id,'type':type,'status':status,'_token':"{{csrf_token()}}"},function (data) {
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
                    $.post("{{url('admin/hospital/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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