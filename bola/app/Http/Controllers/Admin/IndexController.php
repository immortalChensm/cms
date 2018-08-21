<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    //模板文件
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    //后台首页模板页面
    public function index()
    {
        return view('gentelella.production.index');
    }

    //管理员列表页模板页面
    public function admins()
    {
        return view('gentelella.production.admins');
    }

    //管理员添加模板页面
    public function adminadd()
    {
        return view('gentelella.production.form');
    }

    //角色模板页面
    public function roles()
    {
        return view('gentelella.production.roles');
    }

    //分类模板
    public function category()
    {
        return view('gentelella.production.category');
    }

    //分类添加模板
    public function addCategory()
    {
        return view('gentelella.production.categoryadd');
    }

    public function home()
    {
        return view('admin.index.index');
    }
}
