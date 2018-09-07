<?php

namespace App\Model\Home;

use App\Model\Admin\Pyhsician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Users extends Authenticable implements JWTSubject
{
    //
    protected $guarded = [];

    public function physician()
    {
        return $this->hasOne(Pyhsician::class,"userid","id");
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
