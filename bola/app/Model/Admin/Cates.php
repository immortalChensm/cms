<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    protected $table       = 'cates';
    protected $primary_key = 'id';
    public $timestamps     = true;
    protected $guarded     = [];
}
