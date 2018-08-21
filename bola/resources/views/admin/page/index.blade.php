@extends("admin.layout.main")
@section("content")
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>单页列表<small><a href="{{route('page.create')}}" class="btn btn-info" >添加</a></small></h3>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <table class="table" width="100%">
                      <thead>
                      <tr>
                          <th>名称</th>

                          {{--<th>所属菜单</th>--}}

                          <th>发布时间</th>

                          <th>操作</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($data as $page)
                          <tr>
                              <td>{{$page->title}}</td>
                              {{--<td>{{$page->category->name}}</td>--}}
                              <td>{{$page->created_at}}</td>
                              <td><a href="{{route('page.edit',$page->id)}}" class="btn btn-default">编辑</a><a class="delete" href="#" data-id="{{$page->id}}">移除</a></td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
                  <div class="page">

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
              $.post("{{url('admin/page/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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