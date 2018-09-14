<?php

namespace App\Policies\Api;

use App\Model\Admin\Hospital;
use App\Model\Users;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserProfilePolicy
{
    use HandlesAuthorization;

    public function update($hospital)
    {
//        if($hospital->hospital_adminid){
//            return auth("api")->id() === $hospital->hospital_adminid;
//        }
        return true;

    }
}
