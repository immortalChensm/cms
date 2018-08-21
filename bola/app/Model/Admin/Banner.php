<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
   protected $table       = 'banner';
    protected $primary_key = 'id';
    public $timestamps     = true;
    protected $guarded     = [];
}
