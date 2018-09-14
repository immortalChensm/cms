<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

$api = app('Dingo\Api\Routing\Router');


$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
], function($api) {

    //联系我们
    $api->get("contact","AboutController@contact")->name("api.contact");

    //教学培训
    $api->get("trains","TrainController@trains");
    $api->get("trains/details/{id}","TrainController@details");

    //科学项目
    $api->get("scienceproject","ArticleController@projects");
    $api->get("scienceproject/details/{id}","ArticleController@details");

    $api->get("banners","ArticleController@banners");

    //注册
    $api->post("authentication","AuthenticationController@store")->name("api.authentication");
    $api->post("login","AuthenticationController@login");

    //医生资料完善
    $api->group(['middleware'=>'auth.api'],function($api){
        //个人中心初始数据
        $api->get("user/profile","UserprofileController@profile");
        //医生资料保存
        $api->post("user/profile","UserprofileController@handleProfile");
        $api->get("user/profile/skills/{id}","UserprofileController@skill");
        //个人中心床位管理
        $api->post("user/bednum","UserprofileController@updateHospitalBedinfo");
        //转诊记录
        $api->get("user/referrals","UserprofileController@referrals");
        //转诊申请
        $api->post("user/referrals/application","UserprofileController@referralApplication");
        //转诊取消
        $api->post("user/referrals/cancel/{id}","UserprofileController@cancelreferral");
        //测试接口
        //$api->post("trains/test","UserprofileController@test");

        //修改密码
        $api->post("user/resetpassword","UserprofileController@updatePassword");
        //忘记密码
        $api->post("user/forgotpassword","UserprofileController@resetPassword");


    });

    //申请加入医联体 pccm 教学培训
    $api->post("user/join/hospital","GuestController@joinHospital");

    $api->post("trains/test","UserprofileController@test");

    //验证码
    $api->group([
    'middleware' => 'api.throttle',
    'limit' => 5,
    'expires' => 1,
    ], function($api) {
            $api->post("verifycode","VerifycodeController@code");
    });

    //refresh token
    $api->get("refresh/token","AuthenticationController@update");

    //医生列表
    $api->get("physicians",'PhysicianController@physician');
    $api->get("physician/details/{id}",'PhysicianController@doctorsDetails');

    //医院列表
    $api->get("hospitals",'HospitalController@hospitals');
    $api->get("hospitals/details/{id}",'HospitalController@details');
    $api->get("zone/hospitals",'HospitalController@zonehospitals');

    //地区获取
    $api->get("provinces",'CommonController@province');
    $api->get("citytown/{pid}",'CommonController@city');

});
//
//$api->version('v2', [
//    'namespace' => 'App\Http\Controllers\Api',
//], function($api) {
//
//    $api->group([
//        'middleware' => 'api.throttle',
//        'limit' => 1,
//        'expires' => 1,
//    ], function($api) {
//
//        //联系我们
//        $api->get("contact",function(){
//            return "关于我们v2";
//        });
//    });
//});