<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/13
 * Time: 10:33
 */
namespace App\common;

class Base
{

    public static function getMenu()
    {

        $category = \App\Model\Admin\Categorys::all();

        if(count($category)>0){
            $data = \PHPTree::makeTreeForHtml($category);
        }else{
            $data = $category;
        }
        return $data;
    }

}