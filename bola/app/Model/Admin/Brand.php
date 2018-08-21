<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
     protected $table       = 'brand';
    protected $primary_key = 'id';
    public $timestamps     = true;
    protected $guarded     = [];
    
     public function hasOneCate()
    {
        return $this->belongsTo('App\Model\Admin\Classify', 'pid', 'id');
    }
}
