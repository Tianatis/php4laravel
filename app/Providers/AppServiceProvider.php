<?php

namespace App\Providers;
use App\Classes\AuthModel;
use App\Classes\MenuModel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
       $isAuth =  resolve('AuthModel')->isAuth();
       View::share('auth', $isAuth);
       View::share('menu', resolve('MenuModel')->showMenu($isAuth));
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
        $this->app->singleton('AuthModel', function ($app) {
        return new AuthModel();
    });

    }
}
