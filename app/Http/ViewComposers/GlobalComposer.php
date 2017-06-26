<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
class GlobalComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('auth', Auth::user());
        $view->with('isAdmin', ((Auth::check() && Auth::user()->isAdmin())));
        $view->with('isAuthAdmin', (Auth::guard('admins')->check()));
        $view->with('isSuperAdmin', (Auth::guard('admins')->check() && Auth::guard('admins')->user()->isSuperAdmin()));
    }

}