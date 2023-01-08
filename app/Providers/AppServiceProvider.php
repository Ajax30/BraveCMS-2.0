<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Database bug fix
        Schema::defaultStringLength(191);

        // Use Twitter Bootstrap pagination
				Paginator::useBootstrap();

        Blade::if('userCan', function ($permission) {
          return in_array($permission, Auth::user()->role->permissions->pluck('slug')->toArray());
        });
    }
}
