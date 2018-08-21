<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <!--<h3>General</h3>-->
        <ul class="nav side-menu">

            <li><a><i class="fa fa-desktop"></i> 图标UI <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/iconui/*")) style='display:block;' @endif >
                    <li @if(request()->is("*/iconui/*")) class="current-page" @endif><a href="/admin/iconui">系统图标UI</a></li>
                </ul>
            </li>

            @php

            //print_r(Auth::user()->getMenu());
            @endphp
            {{--@foreach(Auth::user()->getMenu() as $k=>$menu)--}}
            {{--<li><a><i class="fa fa-home"></i> {{$menu_chinse[$k]}} <span class="fa fa-chevron-down"></span></a>--}}
                {{--<ul class="nav child_menu" @if(request()->is("*/admins/*") || request()->is("*/roles/*")||request()->is("*/permissions/*")) style='display:block;' @endif>--}}

                    {{--<li @if(request()->is("*/admins/*")) class="current-page" @endif><a href="/admin/admins">管理员列表</a></li>--}}

                    {{--<li @if(request()->is("*/roles/*")) class="current-page" @endif><a href="/admin/roles">角色列表</a></li>--}}

                    {{--<li @if(request()->is("*/permissions/*")) class="current-page" @endif><a href="/admin/permissions">权限列表</a></li>--}}

                    {{--@foreach($menu as $cnmenu=>$item)--}}
                        {{--@foreach($item as $ZhcnName=>$menuItem)--}}
                        {{--<li @if(request()->is("*/{{$menuItem[1]}}/*")) class="current-page" @endif><a href="{{$menuItem[0]}}">{{$ZhcnName}}</a></li>--}}

                        {{--@endforeach--}}
                    {{--@endforeach--}}

                {{--</ul>--}}
            {{--</li>--}}
            {{--@endforeach--}}


            <li><a><i class="fa fa-home"></i> 管理员管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/admins/*") || request()->is("*/roles/*")||request()->is("*/permissions/*")) style='display:block;' @endif>

                    <li @if(request()->is("*/admins/*")) class="current-page" @endif><a href="/admin/admins">管理员列表</a></li>

                    <li @if(request()->is("*/roles/*")) class="current-page" @endif><a href="/admin/roles">角色列表</a></li>

                    <li @if(request()->is("*/permissions/*")) class="current-page" @endif><a href="/admin/permissions">权限列表</a></li>


                </ul>
            </li>

            {{--@can("banner_manage_permission")--}}
            <li><a><i class="fa fa-edit"></i> 轮播器管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/banner/*")) style='display:block;' @endif>
                    <li @if(request()->is("*/banner/*")) class="current-page" @endif><a href="/admin/banner">轮播图列表</a></li>
                </ul>
            </li>
                {{--@endcan--}}

            {{--@can("address_manage_permission")--}}
             <li><a><i class="fa fa-desktop"></i> 地址管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/address/*")) style='display:block;' @endif>
                    <li @if(request()->is("*/address/*")) class="current-page" @endif><a href="/admin/address">地址列表</a></li>
                </ul>
            </li>
              {{--@endcan--}}
             {{--@can("position_manage_permission")--}}
            <li><a><i class="fa fa-desktop"></i> 职位管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/position/*")) style='display:block;' @endif>
                    <li @if(request()->is("*/position/*")) class="current-page" @endif><a href="/admin/position">职位列表</a></li>
                </ul>
            </li>
                {{--@endcan--}}
             {{--@can("posts_manage_permission")--}}
            <li><a><i class="fa fa-desktop"></i> 文章管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/article/*")) style='display:block;' @endif>
                    <li @if(request()->is("*/article/*")) class="current-page" @endif><a href="/admin/article">文章列表</a></li>
                </ul>
            </li>
                {{--@endcan--}}
             {{--@can("cates_manage_permission")--}}
             <li><a><i class="fa fa-desktop"></i> 案例管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/cates/*")) style='display:block;' @endif>
                    <li @if(request()->is("*/cates/*")) class="current-page" @endif><a href="/admin/cates">案例列表</a></li>
                </ul>
            </li>
                {{--@endcan--}}
              {{--@can("brand_manage_permission")--}}
              <li><a><i class="fa fa-desktop"></i> 品牌管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/classify/*") || request()->is("*/brand/*")) style='display:block;' @endif>
                    <li @if(request()->is("*/classify/*")) class="current-page" @endif><a href="/admin/classify">品牌分类</a></li>
                    <li @if(request()->is("*/brand/*")) class="current-page" @endif><a href="/admin/brand">品牌列表</a></li>
                </ul>
            </li>
                {{--@endcan--}}
                <li><a><i class="fa fa-desktop"></i> 菜单管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/categorys/*")) style='display:block;' @endif>
                        <li @if(request()->is("*/categorys/*")) class="current-page" @endif><a href="/admin/categorys" >菜单列表</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-desktop"></i> 单页管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/page/*")) style='display:block;' @endif>
                        <li @if(request()->is("*/page/*")) class="current-page" @endif><a href="/admin/page">单页列表</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-desktop"></i> 产品管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/product-category/*") ||request()->is("*/product/*")) style='display:block;' @endif>
                        <li @if(request()->is("*/product-category/*")) class="current-page" @endif><a href="/admin/product-category" >分类列表</a></li>
                        <li @if(request()->is("*/product/*")) class="current-page" @endif><a href="/admin/product" >产品列表</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-desktop"></i> 新闻管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/news/*")) style='display:block;' @endif>
                        <li  @if(request()->is("*/news/*")) class="current-page" @endif><a href="/admin/news">新闻列表</a></li>
                    </ul>
                </li>

                <li><a><i class="fa fa-desktop"></i> 系统管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/system/*")) style='display:block;' @endif >
                        <li @if(request()->is("*/system/*")) class="current-page" @endif><a href="/admin/system">系统设置</a></li>
                    </ul>
                </li>

        </ul>
    </div>
</div>