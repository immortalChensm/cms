<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <!--<h3>General</h3>-->
        <ul class="nav side-menu">

            {{--<li><a><i class="fa fa-desktop"></i> 图标UI <span class="fa fa-chevron-down"></span></a>--}}
                {{--<ul class="nav child_menu" @if(request()->is("*/iconui/*")) style='display:block;' @endif >--}}
                    {{--<li @if(request()->is("*/iconui/*")) class="current-page" @endif><a href="/admin/iconui">系统图标UI</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}


                @if(auth()->user()->can('admins-list') || auth()->user()->can('permission-list') || auth()->user()->can('role-list') )
            <li><a><i class="fa fa-user"></i> 管理员管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/admins/*") || request()->is("*/roles/*")||request()->is("*/permissions/*")) style='display:block;' @endif>

                    <li @if(request()->is("*/admins/*")) class="current-page" @endif><a href="/admin/admins">管理员列表</a></li>

                    <li @if(request()->is("*/roles/*")) class="current-page" @endif><a href="/admin/roles">角色列表</a></li>

                    <li @if(request()->is("*/permissions/*")) class="current-page" @endif><a href="/admin/permissions">权限列表</a></li>


                </ul>
            </li>
            @endif
            @can("banner-list")
            <li><a><i class="fa fa-film"></i> 轮播器管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/banner/*")) style='display:block;' @endif>
                    <li @if(request()->is("*/banner/*")) class="current-page" @endif><a href="/admin/banner">轮播图列表</a></li>
                </ul>
            </li>
            @endcan


                @if(auth()->user()->can('train-list') || auth()->user()->can('article-list') )
            <li><a><i class="fa fa-file-text-o"></i> 资讯管理 <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" @if(request()->is("*/article/*")) style='display:block;' @endif>
                    @can("article-list")
                    <li @if(request()->is("*/article/*")) class="current-page" @endif><a href="/admin/article">最新资讯管理</a></li>
                    @endcan
                        @can("train-list")
                    <li @if(request()->is("*/train/*")) class="current-page" @endif><a href="/admin/train">最新培训管理</a></li>
                        @endcan
                </ul>
            </li>
            @endif



                @if(auth()->user()->can('position-list') || auth()->user()->can('subject-list') )
                <li><a><i class="fa fa-list-ul"></i>分组管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/categorys/*") || request()->is("*/position/*") || request()->is("*/skill/*")) style='display:block;' @endif>
                        @can("subject-list")
                        <li @if(request()->is("*/categorys/*")) class="current-page" @endif><a href="/admin/categorys" >科室列表</a></li>
                        @endcan
                        @can("subject-list")
                            <li @if(request()->is("*/skill/*")) class="current-page" @endif><a href="/admin/skill" >专长列表</a></li>
                        @endcan
                            @can("position-list")
                        <li @if(request()->is("*/position/*")) class="current-page" @endif><a href="/admin/position">职称列表</a></li>
                            @endcan
                    </ul>
                </li>
            @endif
            @can("page-list")
                <li><a><i class="fa fa-sitemap"></i> 网站管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/page/*")) style='display:block;' @endif>

                        <li @if(request()->is("*//admin/page/7/edit/*")) class="current-page" @endif><a href="/admin/page/7/edit">联系我们</a></li>
                        <li @if(request()->is("*//admin/page/6/edit/*")) class="current-page" @endif><a href="/admin/page/6/edit">关于我们</a></li>
                        <li @if(request()->is("*//admin/page/8/edit/*")) class="current-page" @endif><a href="/admin/page/8/edit">医联体加入流程</a></li>
                        <li @if(request()->is("*//admin/page/9/edit/*")) class="current-page" @endif><a href="/admin/page/9/edit">转诊申请流程</a></li>
                        <li @if(request()->is("*//admin/page/10/edit/*")) class="current-page" @endif><a href="/admin/page/10/edit">加入PCCM流程</a></li>

                    </ul>
                </li>
            @endcan
            @can("hospital-list")
                <li><a><i class="fa fa-hospital-o"></i> 医院管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/hospital/*") ||request()->is("*/hospital/*")) style='display:block;' @endif>

                        <li @if(request()->is("*/hospital/*")) class="current-page" @endif><a href="/admin/hospital" >医院列表</a></li>
                    </ul>
                </li>
            @endcan
            @can("pyhsician-list")
                <li><a><i class="fa fa-plus-circle"></i> 医生管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/pyhsician/*") ) style='display:block;' @endif>

                        <li @if(request()->is("*/pyhsician/*")) class="current-page" @endif><a href="/admin/pyhsician" >医生列表</a></li>
                    </ul>
                </li>
            @endcan
            @can("consulation-list")
                <li><a><i class="fa fa-book"></i> 申请记录 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/consulation/*") ||request()->is("*/hospitalapp/*")) style='display:block;' @endif>

                        <li @if(request()->is("*/consulation/*")) class="current-page" @endif><a href="/admin/consulation" >转诊申请记录列表</a></li>
                        <li @if(request()->is("*/hospitalapp/*")) class="current-page" @endif><a href="/admin/hospitalapp" >申请列表</a></li>
                    </ul>
                </li>
            @endcan

                @can("system-index")
                <li><a><i class="fa fa-desktop"></i> 系统管理 <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" @if(request()->is("*/system/*")) style='display:block;' @endif >
                        <li @if(request()->is("*/system/*")) class="current-page" @endif><a href="/admin/system">系统设置</a></li>
                    </ul>
                </li>
               @endcan

                {{--<li><a><i class="fa fa-desktop"></i> 医联体申请列表 <span class="fa fa-chevron-down"></span></a>--}}
                    {{--<ul class="nav child_menu" @if(request()->is("*/hospitalapp/*")) style='display:block;' @endif >--}}
                        {{--<li @if(request()->is("*/hospitalapp/*")) class="current-page" @endif><a href="/admin/system">系统设置</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}

        </ul>
    </div>
</div>