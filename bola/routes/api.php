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
    $api->get("contact","AboutController@contact");

    //教学培训
    $api->get("trains","TrainController@trains");
    $api->get("trains/details/{id}","TrainController@details");

    //科学项目
    $api->get("scienceproject","ArticleController@projects");
    $api->get("scienceproject/details/{id}","ArticleController@details");
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