<?php

namespace App\Http\Controllers\Home;
use App\Model\Admin\Article;
use App\Model\Admin\Hospital;
use App\Model\Admin\Page;
use App\Model\Admin\Train;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JasonGrimes\Paginator;
class TrainController extends Controller
{
	//列表
    public function teachtrain()
    {
        $param = [
            'page'=>request()->page?:1,
            'keyword'=>request()->keyword?:'',
        ];
        $train= $this->getApi("GET","trains",$param)['body']['data'];

        $totalItems = $train['total'];
        $itemsPerPage = $train['per_page'];
        $currentPage = $train['current_page'];

        $link = "?";

        if(request()->keyword){
            $link.= 'keyword='.request()->keyword."&";
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
        $nav = "教学培训";
        $this->getUserInfo();
        return view('home/index/teachtrain',compact('train','paginator','nav'));
    }


    function teachtraindetail($id)
    {
        $doctorid = request()->id;
        $doctor = $this->getApi("GET","trains/details/".$doctorid,[]);
        if($doctor['body']['status_code']==1){
            $data = $doctor['body']['data'];
        }
        //print_r($data);
        $this->getUserInfo();
        return view('home/index/train_details',compact('data'));

    }


}
