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
上传base64位图片 base64各类型文件
 **/
function uploadImageForBase64($source)
{
    $dir = "./Uploads/".date("Ymd")."/";

    if(!is_dir($dir)){
        mkdir($dir);
    }

    //先检测是否是excel文件
    $pattern_xls = '/data\:application\/vnd\.openxmlformats-officedocument\.spreadsheetml\.sheet/i';
    $pattern_doc = '/application\/vnd\.openxmlformats-officedocument\.wordprocessingml\.document/i';
    $pattern_pdf = '/data\:application\/pdf/i';
    if(preg_match($pattern_xls,$source)){
        $decode_con = preg_replace('/data:.*;base64,/i', '', $source);

        $savePath = $dir.md5(mt_rand(1,1000)).mt_rand(1,9999).".xlsx";

        if(file_put_contents($savePath,base64_decode($decode_con))) {
            return $savePath;
        }else{
            return false;
        }
    }
    if(preg_match($pattern_doc,$source)){
        $decode_con = preg_replace('/data:.*;base64,/i', '', $source);

        $savePath = $dir.md5(mt_rand(1,1000)).mt_rand(1,9999).".doc";

        if(file_put_contents($savePath,base64_decode($decode_con))) {
            return $savePath;
        }else{
            return false;
        }
    }
    if(preg_match($pattern_pdf,$source)){
        $decode_con = preg_replace('/data:.*;base64,/i', '', $source);

        $savePath = $dir.md5(mt_rand(1,1000)).mt_rand(1,9999).".pdf";

        if(file_put_contents($savePath,base64_decode($decode_con))) {
            return $savePath;
        }else{
            return false;
        }
    }


    $decoder = new \Melihovv\Base64ImageDecoder\Base64ImageDecoder($source,$allowedFormats = ['jpeg', 'png', 'gif','jpg','xlsx']);

    if($decoder->getFormat()=='png'){
        $savePath = $dir.md5(mt_rand(1,1000)).mt_rand(1,9999).".png";
    }
    if($decoder->getFormat()=='jpeg'){
        $savePath = $dir.md5(mt_rand(1,1000)).mt_rand(1,9999).".jpg";
    }


    if(file_put_contents($savePath,$decoder->getDecodedContent())) {
        return $savePath;
    }else{
        return false;
    }


}


function configsystem()
{
    return [
        "system"=>'系统名称',
        'webtitle'=>'公司名称',
        'address'=>'公司地址',
        'phone'=>'公司电话',
        'copyright'=>'备案号',
    ];
}

function systemMenu()
{
    return [
        "admins"=>"管理员管理",
        "banner"=>"轮播器管理"
    ];
}
