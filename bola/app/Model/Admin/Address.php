<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table       = 'address';
    protected $primary_key = 'id';
    public $timestamps     = true;
    protected $guarded     = [];
}
