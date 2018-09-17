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

                if($exception->getCode() == 500 && $exception->getMessage() == 'Trying to get property of non-object'){
                    return [
                        'code'=>$exception->getCode(),
                        'msg'=>"传递参数错误",
                        'body'=>$exception->getResponse()->getBody()->getContents(),
                    ];
                }


            }

        }elseif($type=='POST'){
            try{
                $response = $client->post($api,['form_params'=>$param]);
            }catch (RequestException  $exception){
                if($exception->getCode() == 500  && $exception->getMessage() == 'Trying to get property of non-object' || $exception->getCode() == 422){
                    return [
                        'code'=>200,
                        'msg'=>"传递参数错误",
                        'body'=>json_decode($exception->getResponse()->getBody()->getContents(),true),
                    ];
                }
            }

        }

        return [
            'body'=>json_decode($response->getBody()->getContents(),true),
        ];
    }
}
