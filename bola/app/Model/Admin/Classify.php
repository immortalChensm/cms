<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Classify extends Model
{
    protected $table       = 'classify';
    protected $primary_key = 'id';
    public $timestamps     = true;
    protected $guarded     = [];
}
