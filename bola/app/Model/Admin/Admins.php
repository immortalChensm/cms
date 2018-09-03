<?php

namespace App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticable;
use Spatie\Permission\Traits\HasRoles;

class Admins extends Authenticable
{
    use HasRoles;
    protected $rememberTokenName = '';
    protected $table = 'admins';
    protected $primary_key = 'id';
    public $timestamps = true;
    protected $guarded = [];

}
