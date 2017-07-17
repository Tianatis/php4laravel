<?php
namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
class BaseComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $type = Auth::check() ? Auth::user()->isAdmin() : 0;

        $view->with('menu', Menu::active()
            ->userType($type)
            ->ofType((int)strpos(Request()->getPathInfo(), config('app.admin_panel_keyword')))
            ->orderBy('order', 'ASC')
            ->get());

        /* костыль, пока не перепродумаю схему */
        if(Auth::check()){
            $role_id = Auth::user()->isAdmin()? Auth::user()->admin->role_id : Auth::user()->role_id;
        }else{
            $role_id = 6;
        }
        $view->with('role_id', $role_id);

    }

}