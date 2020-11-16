<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
//use \appUser;
use Illuminate\Support\ServiceProvider;

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
     //   Blade::if('admin', function () {
           // return user()->email == 'admin@admin.com';
      //  });
    }
}
