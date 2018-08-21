<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();


//后台组

Route::group(['middleware'=>'web','prefix' => 'admin'], function () {

    //Route::post('/login', [ 'as' => 'login', 'uses' => 'Admin\LoginController@index']);
    Route::get('login', 'Admin\LoginController@index')->name("admin.login");
    Route::get('/', 'Admin\LoginController@index')->name("admin.login");
    Route::post('login', 'Admin\LoginController@login');
    Route::get('index', 'Admin\IndexController@home');


    Route::group(['middleware' => 'auth.admin'], function () {

        //分类管理
        Route::resource('categorys', 'Admin\CategorysController');
        Route::any('uploads/index', 'Admin\UploadController@baidu')->name("upload.config");
        //单页管理
        Route::resource('page', 'Admin\PageController');
        Route::resource('system', 'Admin\SystemController');

        //新闻管理
        Route::post('news/status', 'Admin\NewsController@status');
        Route::resource('news', 'Admin\NewsController');

        //产品分类管理
        Route::post('product-category/status', 'Admin\ProductcategoryController@status');
        Route::resource('product-category', 'Admin\ProductcategoryController');

        //产品管理

        Route::post('product/status', 'Admin\ProductsController@status');
        Route::resource('product', 'Admin\ProductsController');

        //ui
        Route::get('iconui', 'Admin\IconuiController@index');



        Route::get('logout', 'Admin\LoginController@logout');

        //管理员模块
       //Route::group(["middleware"=>"can:admins"],function(){


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
        //});

        //文章分类管理模块
        //Route::group(["middleware"=>"can:article"],function(){
            Route::post('article/status', 'Admin\ArticleController@status');
            Route::resource('article', 'Admin\ArticleController');
        //});

        //地址管理模块
        //Route::group(["middleware"=>"can:address_manage_permission"],function (){
            Route::post('address/status', 'Admin\AddressController@status');
            Route::resource('address', 'Admin\AddressController');
        //});

        //职位管理模块
       // Route::group(["middleware"=>"can:position_manage_permission"],function (){
            Route::post('position/status', 'Admin\PositionController@status');
            Route::resource('position', 'Admin\PositionController');
        //});

        //品牌管理模块
        //Route::group(['middleware'=>"can:brand_manage_permission"],function(){
            Route::post('brand/status', 'Admin\BrandController@status');
            Route::resource('brand', 'Admin\BrandController');

            Route::post('classify/status', 'Admin\ClassifyController@status');
            Route::resource('classify', 'Admin\ClassifyController');
        //});

        //系统设置模块
        Route::group(["middleware"=>"can:system_set_permission"],function(){

        });
        //轮播器
        //Route::group(["middleware"=>"can:banner_manage_permission"],function (){
            Route::post('banner/status', 'Admin\BannerController@status');
            Route::resource('banner', 'Admin\BannerController');

        //});

        //案例管理
        //Route::group(['middleware'=>'can:cates_manage_permission'],function(){
            Route::post('cates/status', 'Admin\CatesController@status');
            Route::resource('cates', 'Admin\CatesController');
        //});






    });
  

    //   //测试模板
    // Route::get('/test', 'Admin\TestController@index');

    // //后台首页模板
    // Route::get('/index', 'Admin\IndexController@index');

    // Route::get('/admins', 'Admin\IndexController@admins');

    // Route::get('/admins/add', 'Admin\IndexController@adminadd');

    // //权限模板
    // Route::get('/roles', 'Admin\IndexController@roles');


    // //分类模板
    // Route::get('/category', 'Admin\IndexController@category');

    // //文章分类添加页面模板
    // Route::get('/category/add', 'Admin\IndexController@addCategory');

    
});

//前台模板示例
include('home.php');
//Route::get("/","Home\TestController@index");