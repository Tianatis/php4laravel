<?php

namespace App\Providers;
use App\Classes\AuthModel;
use App\Classes\MenuModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       /*в будущем получение пользователя*/
       View::share('auth', false);
       View::share('menu', resolve('MenuModel')->baseMenu());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('MenuModel', function ($app) {
             return new MenuModel();
        });
    }
}
