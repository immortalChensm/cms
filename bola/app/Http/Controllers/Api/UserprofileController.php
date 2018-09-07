<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
class UserprofileController extends Controller
{
    public function __construct()
    {
        //$this->middleware('api.auth');

    }

    //
    function profile()
    {

        return $this->success("ok",[\Auth::guard("api")->user()]);
    }
}
