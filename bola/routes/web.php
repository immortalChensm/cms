<?php

//后台组

Route::group(['middleware'=>'web','prefix' => 'admin'], function () {

    Route::get('login', 'Admin\LoginController@index')->name("admin.login");
    Route::get('/', 'Admin\LoginController@index')->name("admin.login");
    Route::post('login', 'Admin\LoginController@login');


    Route::group(['middleware' => 'auth.admin'], function () {

        Route::get('index', 'Admin\IndexController@home');

        //分类管理
        Route::resource('categorys', 'Admin\CategorysController');
        Route::any('uploads/index', 'Admin\UploadController@baidu')->name("upload.config");
        //单页管理
        Route::resource('page', 'Admin\PageController');
        Route::resource('system', 'Admin\SystemController');

        //医院管理
        Route::post('hospital/status', 'Admin\HospitalController@status');
        Route::post('hospital/{hospital}/skill', 'Admin\HospitalController@skill');

        Route::group(['middleware' => ['permission:hospital-list|hospital-edit']],function(){
            Route::resource('hospital', 'Admin\HospitalController');
            Route::get('hospital/{hospital_name?}', 'Admin\HospitalController@index');
            Route::get('region/city', 'Admin\RegionController@getCityData');
        });

        //ui
        Route::get('iconui', 'Admin\IconuiController@index');

        //医生管理
        Route::post('pyhsician/{hospital}/skill', 'Admin\HospitalController@skill');
        Route::post('pyhsician/status', 'Admin\PyhsicianController@status');
        Route::resource('pyhsician', 'Admin\PyhsicianController');


        //转诊申请记录
        Route::resource('consulation', 'Admin\ConsulationController');

        Route::get('logout', 'Admin\LoginController@logout');

        //管理员模块

            //用户的角色列表
            Route::get("admins/{admins}/role",'Admin\AdminsController@role');
            //给用户分配或移除角色
            Route::post("admins/{admins}/role",'Admin\AdminsController@storeOrRemoveRole');

            //角色的权限列表
            Route::get('roles/{roles}/permission', 'Admin\RoleController@permission');
            //给角色分配权限或移除权限
            Route::post('roles/{roles}/permission', 'Admin\RoleController@storeOrRemovePermission');


            //角色管理
            Route::resource('roles', 'Admin\RoleController');

            //权限管理
            Route::resource('permissions', 'Admin\PermissionController');


            Route::post('admins/status', 'Admin\AdminsController@status');

            Route::resource('admins', 'Admin\AdminsController');


        //文章分类管理模块
        Route::post('article/status', 'Admin\ArticleController@status');
        Route::post('train/status', 'Admin\TrainController@status');
        Route::resource('article', 'Admin\ArticleController');
        Route::resource('train', 'Admin\TrainController');

        //职位管理模块
        Route::post('position/status', 'Admin\PositionController@status');
        Route::resource('position', 'Admin\PositionController');
        //轮播器
        Route::post('banner/status', 'Admin\BannerController@status');
        Route::resource('banner', 'Admin\BannerController');


    });


    
});

//前台模板示例
include('home.php');
