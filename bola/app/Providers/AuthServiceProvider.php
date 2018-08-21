<?php

namespace App\Providers;

use function foo\func;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Model\Admin\Permissions;
use App\Model\Admin\Admins;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        $permissions = Permissions::all();
        foreach($permissions as $permission){
            Gate::define($permission->name,function (Admins $user)use($permission){
                    //file_put_contents("/mnt/bola/bola/permission.log",json_encode($user,JSON_UNESCAPED_UNICODE),FILE_APPEND);
                    //file_put_contents("/mnt/bola/bola/permission.log",json_encode($permission,JSON_UNESCAPED_UNICODE),FILE_APPEND);
                   return $user->hasPermission($permission);
                    //return true;
            });
        }

    }
}
