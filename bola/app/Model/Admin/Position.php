<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
     protected $table       = 'position';
    protected $primary_key = 'id';
    public $timestamps     = true;
    protected $guarded     = [];
}
