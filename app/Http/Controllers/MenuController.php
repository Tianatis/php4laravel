<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{

    public static function get_menu()
    {
        $menu = [
            1 => [
                'href' => '/',
                'name' => 'Главная'
            ],
            2 => [
                'href' => '/about',
                'name' => 'О блоге'
            ],
            3 => [
                'href' => '/contacts',
                'name' => 'Контакты'
            ],
            4 => [
                'href' => '/login',
                'name' => 'Авторизация'
            ]
        ];
        return  $menu;
    }


}
