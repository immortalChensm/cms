@extends("admin.layout.main")
@section("content")
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>轮播列表<small><a href="{{route('banner.create')}}" class="btn btn-info" >添加</a></small></h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">

                  {{--<div class="x_content">--}}
                    {{--<div class="row">--}}
                    {{--@foreach ($data as $banner)--}}
                      {{--<div class="col-md-55">--}}
                        {{--<div class="thumbnail">--}}
                          {{--<div class="image view view-first">--}}
                            {{--<img style="width: 100%; display: block;" src="http://bola.mppstore.com/{{$banner->image}}" alt="image" />--}}
                            {{--<div class="mask no-caption">--}}
                              {{--<div class="tools tools-bottom">--}}
                                {{--<!-- <a href="#"><i class="fa fa-link"></i></a> -->--}}
                                {{--<a href="{{route('banner.edit',$banner->id)}}"><i class="fa fa-pencil"></i></a>--}}
                                {{--<a href="#" class="delete" href="#" data-id="{{$banner->id}}"><i class="fa fa-times"></i></a>--}}
                              {{--</div>--}}
                            {{--</div>--}}
                          {{--</div>--}}
                          {{--<div class="caption">--}}
                            {{--<p><strong>{{$banner->title}}</strong>--}}
                            {{--</p>--}}
                            {{--<!-- <p>Snow and Ice Incoming</p> -->--}}
                          {{--</div>--}}
                        {{--</div>--}}
                      {{--</div>--}}
                    {{--@endforeach--}}
                    {{--</div>--}}
                    {{--<div class="page">--}}
                        {{--{!! $data->links() !!}--}}
                    {{--</div>--}}
                  {{--</div>--}}


                  <table class="table" width="100%">
                      <thead>
                      <tr>
                          <th>名称</th>
                          <th>链接</th>
                          <th>图片</th>
                          <th>排序</th>
                          <th>操作</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($data as $banner)
                          <tr>
                              <td>{{$banner->title}}</td>
                              <td>{{$banner->url}}</td>
                              <td><img src="http://bola.mppstore.com/{{$banner->image}}" style="width:100px;"/></td>
                              <td>{{$banner->sort}}</td>
                              <td><a href="{{route('banner.edit',$banner->id)}}" class="btn btn-default">编辑</a><a class="delete" href="#" data-id="{{$banner->id}}">移除</a></td>
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