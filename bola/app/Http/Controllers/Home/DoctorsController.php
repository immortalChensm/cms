<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JasonGrimes\Paginator;
class DoctorsController extends Controller
{

    function doctors()
    {
        $param = [
            'page'=>request()->page?:1,
            'keyword'=>request()->keyword?:'',
            'recommend'=>request()->recommend?:'',
        ];
        $doctors= $this->getApi("GET","physicians",$param)['body']['data'];

        $totalItems = $doctors['total'];
        $itemsPerPage = $doctors['per_page'];
        $currentPage = $doctors['current_page'];

        $link = "?";

        if(request()->keyword){
            $link.= 'keyword='.request()->keyword."&";
        }
        if(request()->recommend){
            $link.= 'recommend='.request()->recommend."&";
        }

        if(strlen($link)>1){
            $link = substr($link,0,-1);
            $urlPattern = $link.'&page=(:num)';
        }else{
            $link = "";
            $urlPattern = '?page=(:num)';
        }
        $this->getUserInfo();
        $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
        $paginator->setMaxPagesToShow(config("api.setMaxPagesToShow"));
        return view('home/index/doctors',compact('doctors','paginator'));
    }

    function doctorsDetails($id)
    {
        $doctorid = request()->id;
        $doctor = $this->getApi("GET","physician/details/".$doctorid,[]);
        if($doctor['body']['status_code']==1){
            $data = $doctor['body']['data'];
        }
        //print_r($data);
        $this->getUserInfo();
        return view('home/index/doctors_details',compact('data'));

    }

}
