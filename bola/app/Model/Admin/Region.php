<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
   protected $table       = 'region';
    protected $primary_key = 'id';
    public $timestamps     = true;
    protected $guarded     = [];
}
