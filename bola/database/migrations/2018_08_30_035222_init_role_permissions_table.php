<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        \Spatie\Permission\Models\Permission::create([
            'name'=>'admins-list',
            'title'=>'管理员列表',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\AdminsController@index'
        ]);
        \Spatie\Permission\Models\Permission::create([
            'name'=>'admins-edit',
            'title'=>'管理员编辑',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\AdminsController@edit'
        ]);
        \Spatie\Permission\Models\Permission::create([
            'name'=>'admins-destroy',
            'title'=>'管理员删除',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\AdminsController@destroy'
        ]);
        \Spatie\Permission\Models\Permission::create([
            'name'=>'admins-add',
            'title'=>'管理员添加',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\AdminsController@store'
        ]);
        \Spatie\Permission\Models\Permission::create([
            'name'=>'admins-status',
            'title'=>'管理员状态管理',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\AdminsController@status'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'role-list',
            'title'=>'角色列表',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\RoleController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'role-add',
            'title'=>'角色添加',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\RoleController@store'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'role-edit',
            'title'=>'角色编辑',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\RoleController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'role-destroy',
            'title'=>'角色删除',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\RoleController@destroy'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'permission-list',
            'title'=>'权限列表',
            'group'=>'管理员管理',
            'action'=>'App\Http\Controllers\Admin\PermissionController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'banner-list',
            'title'=>'轮播器列表',
            'group'=>'轮播器管理',
            'action'=>'App\Http\Controllers\Admin\BannerController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'banner-add',
            'title'=>'轮播器添加',
            'group'=>'轮播器管理',
            'action'=>'App\Http\Controllers\Admin\BannerController@store'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'banner-edit',
            'title'=>'轮播器编辑',
            'group'=>'轮播器管理',
            'action'=>'App\Http\Controllers\Admin\BannerController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'banner-destroy',
            'title'=>'轮播器删除',
            'group'=>'轮播器管理',
            'action'=>'App\Http\Controllers\Admin\BannerController@destroy'
        ]);
        \Spatie\Permission\Models\Permission::create([
            'name'=>'banner-status',
            'title'=>'轮播器状态管理',
            'group'=>'轮播器管理',
            'action'=>'App\Http\Controllers\Admin\BannerController@status'
        ]);



        \Spatie\Permission\Models\Permission::create([
            'name'=>'article-list',
            'title'=>'资讯列表',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\ArticleController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'article-add',
            'title'=>'资讯添加',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\ArticleController@store'
        ]);


        \Spatie\Permission\Models\Permission::create([
            'name'=>'article-edit',
            'title'=>'资讯编辑',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\ArticleController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'article-destroy',
            'title'=>'资讯删除',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\ArticleController@destroy'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'article-status',
            'title'=>'资讯状态管理',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\ArticleController@status'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'train-list',
            'title'=>'培训列表',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\TrainController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'train-add',
            'title'=>'培训添加',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\TrainController@store'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'train-edit',
            'title'=>'培训编辑',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\TrainController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'train-destroy',
            'title'=>'培训删除',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\TrainController@destroy'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'train-status',
            'title'=>'培训状态管理',
            'group'=>'资讯管理',
            'action'=>'App\Http\Controllers\Admin\TrainController@destroy'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'subject-list',
            'title'=>'科室专长列表',
            'group'=>'分组管理',
            'action'=>'App\Http\Controllers\Admin\CategorysController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'subject-add',
            'title'=>'科室专长添加',
            'group'=>'分组管理',
            'action'=>'App\Http\Controllers\Admin\CategorysController@store'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'subject-edit',
            'title'=>'科室专长编辑',
            'group'=>'分组管理',
            'action'=>'App\Http\Controllers\Admin\CategorysController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'subject-destroy',
            'title'=>'科室专长删除',
            'group'=>'分组管理',
            'action'=>'App\Http\Controllers\Admin\CategorysController@destroy'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'position-list',
            'title'=>'职称列表',
            'group'=>'分组管理',
            'action'=>'App\Http\Controllers\Admin\PositionController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'position-add',
            'title'=>'职称添加',
            'group'=>'分组管理',
            'action'=>'App\Http\Controllers\Admin\PositionController@store'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'position-edit',
            'title'=>'职称编辑',
            'group'=>'分组管理',
            'action'=>'App\Http\Controllers\Admin\PositionController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'position-destroy',
            'title'=>'职称删除',
            'group'=>'分组管理',
            'action'=>'App\Http\Controllers\Admin\PositionController@destroy'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'position-status',
            'title'=>'职称状态管理',
            'group'=>'分组管理',
            'action'=>'App\Http\Controllers\Admin\PositionController@status'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'page-list',
            'title'=>'页面列表',
            'group'=>'网站管理',
            'action'=>'App\Http\Controllers\Admin\PageController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'page-edit',
            'title'=>'页面编辑',
            'group'=>'网站管理',
            'action'=>'App\Http\Controllers\Admin\PageController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'page-add',
            'title'=>'页面添加',
            'group'=>'网站管理',
            'action'=>'App\Http\Controllers\Admin\PageController@store'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'page-destroy',
            'title'=>'页面删除',
            'group'=>'网站管理',
            'action'=>'App\Http\Controllers\Admin\PageController@destroy'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'hospital-list',
            'title'=>'医院列表',
            'group'=>'医院管理',
            'action'=>'App\Http\Controllers\Admin\HospitalController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'hospital-add',
            'title'=>'医院添加',
            'group'=>'医院管理',
            'action'=>'App\Http\Controllers\Admin\HospitalController@store'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'hospital-edit',
            'title'=>'医院编辑',
            'group'=>'医院管理',
            'action'=>'App\Http\Controllers\Admin\HospitalController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'hospital-destroy',
            'title'=>'医院删除',
            'group'=>'医院管理',
            'action'=>'App\Http\Controllers\Admin\HospitalController@destroy'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'hospital-status',
            'title'=>'医院状态管理',
            'group'=>'医院管理',
            'action'=>'App\Http\Controllers\Admin\HospitalController@status'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'pyhsician-list',
            'title'=>'医生列表',
            'group'=>'医生管理',
            'action'=>'App\Http\Controllers\Admin\PyhsicianController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'pyhsician-add',
            'title'=>'医生添加',
            'group'=>'医生管理',
            'action'=>'App\Http\Controllers\Admin\PyhsicianController@store'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'pyhsician-edit',
            'title'=>'医生编辑',
            'group'=>'医生管理',
            'action'=>'App\Http\Controllers\Admin\PyhsicianController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'pyhsician-destroy',
            'title'=>'医生删除',
            'group'=>'医生管理',
            'action'=>'App\Http\Controllers\Admin\PyhsicianController@destroy'
        ]);


        \Spatie\Permission\Models\Permission::create([
            'name'=>'pyhsician-status',
            'title'=>'医生状态管理',
            'group'=>'医生管理',
            'action'=>'App\Http\Controllers\Admin\PyhsicianController@status'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'consulation-list',
            'title'=>'转诊申请列表',
            'group'=>'转诊申请记录',
            'action'=>'App\Http\Controllers\Admin\ConsulationController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'consulation-edit',
            'title'=>'转诊申请处理',
            'group'=>'转诊申请记录',
            'action'=>'App\Http\Controllers\Admin\ConsulationController@edit'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'system-index',
            'title'=>'系统设置页面',
            'group'=>'系统管理',
            'action'=>'App\Http\Controllers\Admin\SystemController@index'
        ]);

        \Spatie\Permission\Models\Permission::create([
            'name'=>'system-edit',
            'title'=>'系统设置',
            'group'=>'系统管理',
            'action'=>'App\Http\Controllers\Admin\SystemController@edit'
        ]);

        //角色添加
//        \Spatie\Permission\Models\Role::create([
//            ["name"=>"系统管理员"],
//            ["name"=>"医生管理员"],
//            ["name"=>"医院管理员"],
//            ["name"=>"资讯管理员"]
//        ]);
        //给角色分配权限
        $system = \Spatie\Permission\Models\Role::create(["name"=>"系统管理员"]);
        $pyhsician = \Spatie\Permission\Models\Role::create(["name"=>"医生管理员"]);
        $system->givePermissionTo([
            "admins-list",
            "admins-destroy",
            "admins-edit",
            "admins-add",
            "admins-status",
            "role-list",
            "role-add",
            "role-edit",
            "role-destroy",
            "permission-list",
            "banner-list",
            "banner-edit",
            "banner-destroy",
            "banner-status",
            "banner-add",
            "article-list",
            "article-add",
            "article-edit",
            "article-destroy",
            "article-status",
            "train-list",
            "train-edit",
            "train-destroy",
            "train-add",
            "train-status",
            "subject-list",
            "subject-edit",
            "subject-add",
            "subject-destroy",
            "position-list",
            "position-edit",
            "position-add",
            "position-destroy",
            "position-status",
            "page-list",
            "page-edit",
            "page-add",
            "page-destroy",
            "hospital-list",
            "hospital-add",
            "hospital-edit",
            "hospital-destroy",
            "hospital-status",
            "pyhsician-list",
            "pyhsician-edit",
            "pyhsician-add",
            "pyhsician-destroy",
            "pyhsician-status",
            "consulation-list",
            "consulation-edit",
            "system-index",
            "system-edit"
        ]);

        $pyhsician->givePermissionTo([
            "pyhsician-list",
            "pyhsician-edit",
            "pyhsician-add",
            "pyhsician-destroy",
            "pyhsician-status",
        ]);

        $user = \App\Model\Admin\Admins::where("account","admin")->first();
        $user->assignRole($system);

        $test = \App\Model\Admin\Admins::where("account","test")->first();
        $test->assignRole($pyhsician);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
