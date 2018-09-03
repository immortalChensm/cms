@extends("admin.layout.main")
@section("content")
  <div class="right_col" role="main">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                  <h3>单页列表<small><a href="{{route('page.create')}}" class="btn btn-info" >添加</a></small></h3>
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

                              <th class="column-title" width="20%">发布时间 </th>
                              <th class="column-title" width="20%">操作 </th>
                          </tr>
                          </thead>

                          <tbody>

                          @foreach ($data as $page)
                              <tr class="even pointer">
                                  <td class=" ">{{$page->id}}</th>
                                  <td class=" ">{{$page->title}}</th>
                                  <td class=" ">{{$page->created_at}}</th>


                                  <td><a href="{{route('page.edit',$page->id)}}" class="btn btn-success btn-sm">编辑</a><a class="delete btn btn-danger btn-sm" href="#" data-id="{{$page->id}}">移除</a></td>
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