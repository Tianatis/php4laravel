<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController
{
    public function about()
    {
        $menu = resolve('MenuModel')->showMenu(Auth::check());
        return view('public.pages.about', ['title' => 'О бологе', 'menu' => $menu, 'content' => '<p>Этот блог создан в рамках курса PHP Strong (PHP4)</p>']);
    }

    public function contacts()
    {
        $menu = resolve('MenuModel')->showMenu(Auth::check());
        return view('public.pages.contacts', ['title' => 'Контакты', 'menu' => $menu, 'content' => '<p>Где-то на бескрайних просторах инета</p>']);

    }
}
