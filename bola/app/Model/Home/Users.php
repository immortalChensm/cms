<?php

namespace App\Model\Home;

use App\Model\Admin\Pyhsician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
class Users extends Authenticable
{
    //
    protected $guarded = [];

    public function physician()
    {
        return $this->hasOne(Pyhsician::class,"userid","id");
    }
}
