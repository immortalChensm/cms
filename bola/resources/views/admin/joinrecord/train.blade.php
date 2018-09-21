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
                          <li><a href="javascript:history.back();">返回</a></li>

                      </ul>

                  </h2>
                  {{--<ul class="nav navbar-right panel_toolbox">--}}
                      {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                      {{--</li>--}}





                      {{--<li class="dropdown">--}}
                          {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>--}}
                      {{--</li>--}}
                      {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                      {{--</li>--}}
                  {{--</ul>--}}
                  <div class="clearfix"></div>
              </div>

              <div class="x_content">
                  <div class="table-responsive">
                      <table class="table table-striped ait-table bulk_action" style="width:100% !important;">
                          <thead>
                          <tr class="headings">
                              <th class="column-title" width="60px">#</th>
                              <th class="column-title" width="100px">姓名 </th>
                              <th class="column-title" width="100px">手机号 </th>
                              <th class="column-title" width="100px">申请凭证 </th>
                          </tr>
                          </thead>

                          <tbody>
                                @foreach($join as $key=>$item)
                                    <tr>
                                    <td class="column-title" >{{$key+1}}</td>
                                    <td class="column-title" >{{$item->username}}</td>
                                    <td class="column-title" >{{$item->mobile}}</td>
                                    <td class="column-title" >
                                        @if($item->cert)
                                            <a href="{{request()->getSchemeAndHttpHost().$item->cert}}" target="_blank" class="btn btn-info btn-sm">下载</a>
                                            @else
                                            没有附件
                                            @endif


                                    </td>

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

  </div>

@endsection