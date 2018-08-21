<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $table       = 'article';
    protected $primary_key = 'id';
    public $timestamps     = true;
    protected $guarded     = [];
}
