<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
   protected $table       = 'system';
    protected $guarded     = [];

//    public function category()
//    {
//        return $this->belongsTo(Categorys::class,'categoryid','id');
//    }
}
