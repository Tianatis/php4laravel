<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Respond' => 'App\Policies\RespondPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('add-message', function ($user) {

            return $user->is_admin == 0;

        });
        Gate::define('respond-message', function ($user) {
            /* передан пользователь из таблицы admins */
            return $user->role_id < 3;

        });
        /* альтернативный метод */
        Gate::define('delete-message', function ($user) {
            /* передан пользователь из таблицы users */
            /* используем связанную таблцу admins */
            return $user->admin->isAdministrator();

        });
        Gate::define('delete-respond', 'App\Policies\RespondPolicy@delete');

        //

    }
}
