<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        $view->composer('*', 'App\Http\ViewComposers\GlobalComposer');
        $view->composer('front.parts.navigation', 'App\Http\ViewComposers\BaseComposer');
        $view->composer('back.parts.navigation', 'App\Http\ViewComposers\BaseComposer');
    }

    public function register()
    {
        //
    }

}