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

      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                  <h2>
                      <ul class="search-header">
                          <li>轮播图/列表</li>

                          <li><small ><a href="{{route('banner.create')}}" class="btn btn-info" >添加</a></small></li>
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
                              <th class="column-title" width="20%">名称 </th>
                              <th class="column-title" width="20%">链接 </th>
                              <th class="column-title" width="20%">图片 </th>
                              <th class="column-title" width="20%">状态 </th>
                              <th class="column-title" width="20%">操作 </th>
                          </tr>
                          </thead>

                          <tbody>

                          @foreach ($data as $key=>$banner)
                              <tr class="even pointer">
                                  <td class=" ">{{$key+1}}</th>
                                  <td class=" ">{{$banner->title}}</th>
                                  <td class=" ">{{$banner->url}}</th>
                                  <td class=" "><img src="{{request()->getSchemeAndHttpHost().$banner->image}}" style="width:100px;"/></td>

                                  <td class="">

                                      <div class="">
                                          <label>
                                              {{--@if($banner->status==1)--}}
                                                  {{--<input type="checkbox" class="js-switch status"   checked data-id="{{$banner->id}}" data-status="0" />--}}
                                              {{--@else--}}
                                                  {{--<input type="checkbox" class="js-switch status"   data-id="{{$banner->id}}" data-status="1" />--}}
                                              {{--@endif--}}

                                              <input type="checkbox" class="js-switch status"   checked data-id="{{$banner->id}}" data-status="0" />

                                          </label>
                                      </div>

                                  </td>
                                  <td><a href="{{route('banner.edit',$banner->id)}}" class="btn btn-success btn-sm">编辑</a><a class="delete btn btn-danger btn-sm" href="#" data-id="{{$banner->id}}">删除</a></td>
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
  <script>

      $(".status").on("click",function(){
          //var id = $(this).attr('data-id');
          //var status = $(this).attr('data-status');

          console.log($(this).next("span").find("small").attr("style"));

          {{--$.post("{{url('admin/banner/status')}}",{'id':id,'status':status,'_token':"{{csrf_token()}}"},function (data) {--}}
              {{--if(data.status==1){--}}
                  {{--layer.msg(data.message, {icon: 6},function(){--}}
                      {{--//window.location.reload();--}}
                  {{--});--}}

              {{--}else{--}}
                  {{--layer.msg(data.message, {icon: 5});--}}
              {{--}--}}
          {{--},'json');--}}


          {{--return false;--}}
      });

      $('.delete').click(function(){
          var id = $(this).attr('data-id');
          layer.confirm('您确定要删除吗？', {
              btn: ['确定','取消'] //按钮
          }, function(){
              $.post("{{url('admin/banner/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
@endsection