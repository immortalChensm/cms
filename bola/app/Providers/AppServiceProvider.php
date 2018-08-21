<?php

namespace App\Providers;
use App\Model\Admin\Admins;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);
        $sys = DB::table("config")->get();
        $menu_chinse = systemMenu();
        View::share("sys",$sys);
    
        View::share("menu_chinse",$menu_chinse);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
