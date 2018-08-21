<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Position;
use Illuminate\Http\Request;
use App\Http\Requests\PositionPost;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
class UploadController extends Controller
{
      public function baidu()
      {
            $this->UploadController->baiduUpload();
      }
}
