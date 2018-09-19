<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Filesystem\Cache;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use baidu\Controller\UploadController;
use Illuminate\Support\Facades\DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $region_parent_id = 0;
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if($name=="UploadController"){
            return new UploadController();
        }
    }

    public function __construct()
    {
        $sys = DB::table("config")->get();

    }

    function getUserInfo()
    {
        $urlS = ['/login.html','/login/success.html','/login','/register.html','/register','/getCode','/getZone','/zoneHospital','/region/city'];
        if(!in_array(request()->getRequestUri(),$urlS)){
            $doctor = $this->getApi("GET","user/info",['token'=>session("user")['access_token']]);
            if($doctor['body']['status_code']==1){
                session(['userinfo'=>$doctor['body']['data']]);
            }else{
                return redirect("/login.html?prevurl=".request()->getRequestUri());
            }

        }
    }

    public function getProvince()
    {
        return Db::table("region")->where("level",1)->get();
    }

    public function getCity()
    {
        return Db::table("region")->where("parent_id",$this->region_parent_id)->get();
    }

    public function getApi($type='GET',$api,$param)
    {
        $client = new Client([
            'base_uri' => env("API_HOST"),
            'timeout'  => env("API_TIMEOUT")
        ]);

        if($type=='GET'){
            try{
                $response = $client->get($api,['query'=>$param]);
            }catch (RequestException  $exception){

                $errors = json_decode($exception->getResponse()->getBody()->getContents(),true);

                if($exception->getCode() == 500 && $exception->getMessage() == 'Trying to get property of non-object'){
                    $response = [
                        'code'=>401,
                        'msg'=>"传递参数错误",
                        'body'=>$errors,
                    ];
                }
                if($errors['message'] == 'The token has been blacklisted'){

                    $response = [
                        'code'=>402,
                        'msg'=>"token已过期",
                        'body'=>$errors,
                    ];

                }
                return $response;

            }

        }elseif($type=='POST'){
            try{
                $response = $client->post($api,['form_params'=>$param]);
            }catch (RequestException  $exception){

                $errors = json_decode($exception->getResponse()->getBody()->getContents(),true);

                if($exception->getCode() == 500  && $exception->getMessage() == 'Trying to get property of non-object' || $exception->getCode() == 422){
                    $response = [
                        'code'=>401,
                        'msg'=>"传递参数错误",
                        'body'=>$errors,
                    ];
                }
                if($errors['message'] == 'The token has been blacklisted'){

                    $response = [
                        'code'=>402,
                        'msg'=>"token已过期",
                        'body'=>$errors,
                    ];

                }
                return $response;
            }

        }

        return [
            'body'=>json_decode($response->getBody()->getContents(),true),
        ];
    }
}
