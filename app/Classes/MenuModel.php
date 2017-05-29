<?php
namespace App\Classes;


class MenuModel
{

    public function showMenu($isAuth)
    {
        $menu = self::baseMenu();

        if($isAuth){

            $menu['authorize'] = [
                'position' => 4,
                'href' => '/logout',
                'name' => 'Выход',
                'active' => false
            ];
            unset($menu['registration']);
        }

        return $menu;

    }

    public static function baseMenu()
    {
        $menu = [
            'index' => [
                'position' => 1,
                'href' => '/',
                'name' => 'Главная',
                'active' => false
            ],
            'about' => [
                'position' => 2,
                'href' => '/about',
                'name' => 'О блоге',
                'active' => false
            ],
            'contacts' => [
                'position' => 3,
                'href' => '/contacts',
                'name' => 'Контакты',
                'active' => false
            ],
            'authorize' => [
                'position' => 4,
                'href' => '/login',
                'name' => 'Авторизация',
                'active' => false
            ],
            'registration' => [
                'position' => 4,
                'href' => '/register',
                'name' => 'Регистрация',
                'active' => false
            ],
        ];
        return  $menu;
    }
}