<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class TestController
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gentelella.production.test');
    }
}
