<?php
Route::group(['prefix' => ''], function () {


     Route::get('/', 'Home\IndexController@index');
     Route::get('/index.html', 'Home\IndexController@index');

     //医院模块
     Route::get('/hospitals.html', 'Home\HospitalController@hospitals');
     Route::get('/hospital/detail/{id}.html', 'Home\HospitalController@hospitalsDetails');


     //医生模块
     Route::get('/doctors.html', 'Home\DoctorsController@doctors');
     Route::get('/doctor/detail/{id}.html', 'Home\DoctorsController@doctorsDetails');

     //转诊申请
     Route::get('/application.html', 'Home\ApplicationreferraController@referralapplication');


     Route::get('/submitsuccess.html', 'Home\IndexController@submitsuccess');

     //教学培训
     Route::get('/teachtrain.html', 'Home\TrainController@teachtrain');
     Route::get('/teachtrain/detail/{id}.html', 'Home\TrainController@teachtraindetail');

    //科研项目
     Route::get('/information.html', 'Home\InfoController@information');
     Route::get('/information/detail/{id}.html', 'Home\InfoController@informationdetail');


     //关于我们
     Route::get('/aboutus.html', 'Home\IndexController@aboutus');

     //加入医联体
     Route::get('/joinprocess.html', 'Home\IndexController@joinprocess');
     Route::get('/joinylt.html', 'Home\IndexController@joinylt');

     Route::get('/joinpccmorocess.html', 'Home\IndexController@joinpccmorocess');
     Route::get('/joinpccm.html', 'Home\IndexController@joinpccm');
     Route::post('/joinpccm', 'Home\IndexController@Submitjoinpccm');

     //教学培训
     Route::get('/jointeach/{id}.html', 'Home\IndexController@jointrain');


     //登录、注册
     Route::get('/login.html', 'Home\IndexController@login');
     Route::get('/login/success.html', 'Home\IndexController@loginSuccess');
     Route::post('/login', 'Home\IndexController@doLogin');


     Route::get('/register.html', 'Home\IndexController@register');
     Route::post('/register', 'Home\IndexController@doRegister');
     Route::post('/getCode', 'Home\IndexController@getCode');
     Route::get('/getZone', 'Home\IndexController@getAllZone');
     Route::post('/zoneHospital', 'Home\IndexController@zoneHospital');


     //个人中心
     Route::get('/user/center.html', 'Home\IndexController@User');
     Route::post('/profile', 'Home\IndexController@profile');
     Route::post('/skills', 'Home\IndexController@skills');

     //修改密码
     Route::get('/alterpsw.html', 'Home\IndexController@alterpsw');
     Route::post('/password', 'Home\IndexController@password');


     Route::get('/referralrecord.html', 'Home\IndexController@referralrecord');
     //床位管理
     Route::get('/bed.html', 'Home\IndexController@bed');
     Route::post('/bed', 'Home\IndexController@bedStore');

     Route::get('/jinxiuapplication.html', 'Home\IndexController@jinxiuapplication');

     //转诊申请
     Route::get('/referralaplprocess.html', 'Home\IndexController@referralapplicationprocess');
     Route::post('/referralaplprocess', 'Home\IndexController@transfer');
     Route::post('/referral/canncel', 'Home\IndexController@cancel');

     Route::get('/region/city', 'Home\IndexController@getCityData');
     //忘记密码
     Route::get('/frogotpwd.html', 'Home\IndexController@forgotpwd');
     Route::post('/forgotpwd', 'Home\IndexController@resetPwd');

     //upload
     Route::post('/upload', 'Home\IndexController@upload');
     Route::get('/logout.html', 'Home\IndexController@logout');


});
   

