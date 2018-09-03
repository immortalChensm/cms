<?php
Route::group(['prefix' => ''], function () {
     Route::get('/', 'Home\IndexController@index');

    Route::get('/index.html', 'Home\IndexController@index');

    //关于
    Route::get('info.html', 'Home\AbountController@index');

     Route::get('milestones.html', 'Home\AbountController@milestones');
     //荣誉

     //Route::get('abount/honor', 'Home\HospitalController@index');
     Route::get('honor.html', 'Home\AbountController@honor');
     //医院联盟
     Route::get('hospitals.html', 'Home\HospitalController@index');
     Route::get('hospitals-details-{hospitalid}.html', 'Home\HospitalController@hospitalDetails');

     //服务
     //Route::get('service/index', 'Home\ServiceController@index');
     Route::get('platform.html', 'Home\ServiceController@index');
     Route::get('customer.html', 'Home\ServiceController@customer');
     Route::get('case.html', 'Home\ServiceController@case');
     //动态news.html
    //Route::get("news/index",'Home\NewsController@index');
    Route::get("news.html",'Home\NewsController@index');
    Route::get("news/newsajax",'Home\NewsController@newsajax');

    //加入博拉join.html
    //Route::get("position/index",'Home\PositionController@index');
    Route::get("join.html",'Home\PositionController@index');

    //联系我们
    //Route::get("contact/index",'Home\ContactController@index');
    Route::get("contact.html",'Home\ContactController@index');

    //详情
    //Route::get("article/details",'Home\NewsController@details');
    Route::get("news/{news}.html",'Home\NewsController@details');
    //Route::get("article/details",'Home\NewsController@details');

});
   

