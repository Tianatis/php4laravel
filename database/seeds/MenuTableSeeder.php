<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('menu')->insert([
            'order' => '1',
            'name' => 'index',
            'link' => '/',
            'title' => 'Главная',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '2',
            'name' => 'blog',
            'link' => '/blog',
            'title' => 'Блог',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '3',
            'name' => 'messages',
            'link' => '/messages',
            'title' => 'Сообщения',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '4',
            'name' => 'about',
            'link' => '/about',
            'title' => 'О блоге',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '5',
            'name' => 'contacts',
            'link' => '/contacts',
            'title' => 'Контакты',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '6',
            'name' => 'panel',
            'link' => '/PANEL',
            'title' => 'Админка',
            'admin_only' => 1,
            'type' => 0,
            'need_auth' => 1,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '6',
            'name' => 'add',
            'link' => '/blog/add',
            'title' => 'Добавить статью',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 1,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '7',
            'name' => 'login',
            'link' => '/login',
            'title' => 'Авторизация',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '7',
            'name' => 'logout',
            'link' => '/logout',
            'title' => 'Выход',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 1,
            'active' => 1,
        ]);



        DB::table('menu')->insert([
            'order' => '8',
            'name' => 'registration',
            'link' => '/register',
            'title' => 'Регистрация',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);


        DB::table('menu')->insert([
            'order' => '1',
            'name' => 'index',
            'link' => '/PANEL',
            'title' => 'Обзор',
            'admin_only' => 1,
            'type' => 1,
            'need_auth' => 1,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '2',
            'name' => 'articles',
            'link' => '/PANEL/articles',
            'title' => 'Статьи',
            'admin_only' => 1,
            'type' => 1,
            'need_auth' => 1,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '3',
            'name' => 'administrators',
            'link' => '/PANEL/administrators',
            'title' => 'Aдмины',
            'admin_only' => 1,
            'type' => 1,
            'need_auth' => 1,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '4',
            'name' => 'messages',
            'link' => '/PANEL/messages',
            'title' => 'Сообщения',
            'admin_only' => 1,
            'type' => 1,
            'need_auth' => 1,
            'active' => 1,
        ]);
        DB::table('menu')->insert([
            'order' => '5',
            'name' => 'users',
            'link' => '/PANEL/users',
            'title' => 'Пользователи',
            'admin_only' => 1,
            'type' => 1,
            'need_auth' => 0,
            'active' => 1,
        ]);
        DB::table('menu')->insert([
            'order' => '6',
            'name' => 'home',
            'link' => '/',
            'title' => 'Сайт',
            'admin_only' => 0,
            'type' => 1,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '7',
            'name' => 'logout',
            'link' => '/PANEL/logout',
            'title' => 'Выход',
            'admin_only' => 1,
            'type' => 1,
            'need_auth' => 1,
            'active' => 1,
        ]);
    }
}
