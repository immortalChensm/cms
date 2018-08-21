<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   protected $table       = 'pages';
    protected $guarded     = [];

//    public function category()
//    {
//        return $this->belongsTo(Categorys::class,'categoryid','id');
//    }
}
