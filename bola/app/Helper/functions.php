<?php
/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
function showMsg($status, $message = '', $url = '', $data = array())
{
    $result = array(
        'status'  => $status,
        'message' => $message,
        'url'     => $url,
        'data'    => $data,
    );
    if ($status == 1) {
        echo json_encode($result);
    } else {
        exit(json_encode($result));
    }
}

/**
上传base64位图片
 **/
function uploadImageForBase64($source)
{
    $dir = "./Uploads/".date("Ymd")."/";

    if(!is_dir($dir)){
        mkdir($dir);
    }
    //data:image/png;base64,  data:image/jpeg;base64,
    $image = $source;
    if(preg_match('/png/',$image)){
        $savePath = $dir.md5(mt_rand(1,1000)).mt_rand(1,9999).".png";
        $image = base64_decode(str_replace("data:image/png;base64,","",$image));
    }

    if(preg_match('/jpeg/',$image)){
        $savePath = $dir.md5(mt_rand(1,1000)).mt_rand(1,9999).".jpg";
        $image = base64_decode(str_replace("data:image/jpeg;base64,","",$image));
    }


    if(file_put_contents($savePath,$image)) {

        return $savePath;
    }else{
        return false;
    }
}


function configsystem()
{
    return [
        "system"=>'系统名称',
        'webtitle'=>'网站标题'
    ];
}

function systemMenu()
{
    return [
        "admins"=>"管理员管理",
        "banner"=>"轮播器管理"
    ];
}

