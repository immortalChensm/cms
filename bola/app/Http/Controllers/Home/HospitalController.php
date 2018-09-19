<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use JasonGrimes\Paginator;

class HospitalController extends Controller
{

    function hospitals()
    {
        $param = [
            'page'=>request()->page?:1,
            'keyword'=>request()->keyword?:'',
            'province'=>request()->province?:'',
            'city'=>request()->city?:'',
            'county'=>request()->county?:'',
        ];
        $hospital = $this->getApi("GET","hospitals",$param)['body']['data'];
        $totalItems = $hospital['total'];
        $itemsPerPage = $hospital['per_page'];
        $currentPage = $hospital['current_page'];

        $link = "?";

        if(request()->keyword){
            $link.= 'keyword='.request()->keyword."&";
        }
        if(request()->province){
            $link.= 'province='.request()->province."&";
        }
        if(request()->city){
            $link.= 'city='.request()->city."&";
        }
        if(request()->county){
            $link.= 'county='.request()->county."&";
        }
        if(strlen($link)>1){
            $link = substr($link,0,-1);
            $urlPattern = $link.'&page=(:num)';
        }else{
            $link = "";
            $urlPattern = '?page=(:num)';
        }

        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $paginator->setMaxPagesToShow(config("api.setMaxPagesToShow"));
        $provinceS = $this->getProvince();
        $this->getUserInfo();
        return view('home/index/hospitals',compact('hospital','paginator','provinceS'));
    }

    function getCityData()
    {
        if(request()->areaid!=0){
            $this->region_parent_id = request()->areaid;
            $ret = $this->getCity();
            showMsg("success",$ret);
        }

    }

    function hospitalsDetails()
    {
        $hospitalid = request()->id;
        $hospital = $this->getApi("GET","hospitals/details/".$hospitalid,[]);
        if($hospital['body']['status_code']==1){
            $data = $hospital['body']['data'];
        }
        //print_r($data);
        $this->getUserInfo();
        return view('home/index/hospitals_details',compact('data'));
    }

}
