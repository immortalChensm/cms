<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use JasonGrimes\Paginator;

class IndexController extends Controller
{

    function index()
    {
        return view('home/index/index');
    }
//
//    function hospitals()
//    {
//        $param = [
//            'page'=>request()->page?:1,
//            'keyword'=>request()->keyword?:'',
//            'province'=>request()->province?:'',
//            'city'=>request()->city?:'',
//            'county'=>request()->county?:'',
//        ];
//        $hospital = $this->getApi("GET","hospitals",$param)['body']['data'];
//        $totalItems = $hospital['total'];
//        $itemsPerPage = $hospital['per_page'];
//        $currentPage = $hospital['current_page'];
//
//        $link = "?";
//
//        if(request()->keyword){
//            $link.= 'keyword='.request()->keyword."&";
//        }
//        if(request()->province){
//            $link.= 'province='.request()->province."&";
//        }
//        if(request()->city){
//            $link.= 'city='.request()->city."&";
//        }
//        if(request()->county){
//            $link.= 'county='.request()->county."&";
//        }
//        if(strlen($link)>1){
//            $link = substr($link,0,-1);
//            $urlPattern = $link.'&page=(:num)';
//        }else{
//            $link = "";
//            $urlPattern = '?page=(:num)';
//        }
//
//        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
//        $paginator->setMaxPagesToShow(config("api.setMaxPagesToShow"));
//        $provinceS = $this->getProvince();
//        return view('home/index/hospitals',compact('hospital','paginator','provinceS'));
//    }
//
//    function getCityData()
//    {
//        if(request()->areaid!=0){
//            $this->region_parent_id = request()->areaid;
//            $ret = $this->getCity();
//            showMsg("success",$ret);
//        }
//
//    }
//
//    function hospitalsDetails()
//    {
//        return view('home/index/hospitals_details');
//    }
//
//    function doctors()
//    {
//        return view('home/index/doctors');
//    }
//
//    function doctorsDetails()
//    {
//        return view('home/index/doctors_details');
//    }
//
//    function referralapplication()
//    {
//        return view('home/index/referralapplication');
//    }
//
//    function submitsuccess()
//    {
//        return view('home/index/submitsuccess');
//    }
//
//    function teachtrain()
//    {
//        return view('home/index/teachtrain');
//    }
//
//    function teachtraindetail()
//    {
//        return view('home/index/teachtraindetail');
//    }
//
//    function information()
//    {
//        return view('home/index/information');
//    }
//
//    function informationdetail()
//    {
//        return view('home/index/informationdetail');
//    }
//
//    function personalcenter()
//    {
//        return view('home/index/personalcenter');
//    }
//
//    function alterpsw()
//    {
//        return view('home/index/alterpsw');
//    }
//
//    function referralrecord()
//    {
//        return view('home/index/referralrecord');
//    }
//
//    function bed()
//    {
//        return view('home/index/bed');
//    }
//
//    function jinxiuapplication()
//    {
//        return view('home/index/jinxiuapplication');
//    }
//

//
//    function joinpccmorocess()
//    {
//        return view('home/index/joinpccmorocess');
//    }
//

//

//
//    function referralapplicationprocess()
//    {
//        return view('home/index/referralapplicationprocess');
//    }

    function aboutus()
    {
        $data = $this->getContact();

        return view('home/index/aboutus',compact('data'));
    }

    function getContact()
    {
        $ret = $this->getApi("GET","contact",[]);
        if($ret['body']['status_code']==1){
            $data = $ret['body']['data'];
        }
        return $data;
    }

    function joinprocess()
    {
        $data = $this->getContact();
        return view('home/index/joinprocess',compact('data'));
    }

    function joinylt()
    {
        return view('home/index/joinylt');
    }

    function joinpccmorocess()
    {
        $data = $this->getContact();
        return view('home/index/joinpccmorocess',compact('data'));
    }

    function joinpccm()
    {
        return view('home/index/joinpccm');
    }

    //提交加入pccm
    function Submitjoinpccm()
    {
        if(request()->post("type")=='pccm'){
            $type = 2;
        }
        $data = [
            'username'=>request()->post("username"),
            'mobile'=>request()->post("mobile"),
            'cert'=>request()->post("image"),
            'type'=>$type,

        ];
        $ret = $this->getApi("POST","user/join/hospital",$data);
        if(isset($ret['body']['status_code'])&&$ret['body']['status_code']==1){
            $result = $ret['body']['data'];
            showMsg(1,"提交成功",$ret);
        }else{
            showMsg(0,$ret['body']['errors']);
        }

    }

    function register()
    {
        return view('home/index/register');
    }

    function login()
    {
        return view('home/index/login');
    }


}
