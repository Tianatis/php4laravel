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
            'name' => 'about',
            'link' => '/about',
            'title' => 'О блоге',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '4',
            'name' => 'contacts',
            'link' => '/contacts',
            'title' => 'Контакты',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '5',
            'name' => 'login',
            'link' => '/login',
            'title' => 'Авторизация',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 0,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '5',
            'name' => 'logout',
            'link' => '/logout',
            'title' => 'Выход',
            'admin_only' => 0,
            'type' => 0,
            'need_auth' => 1,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '6',
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
            'title' => 'Панель администрирования',
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
            'name' => 'add_article',
            'link' => '/PANEL/articles/add',
            'title' => 'Добавить статью',
            'admin_only' => 1,
            'type' => 1,
            'need_auth' => 1,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '4',
            'name' => 'add_admin',
            'link' => '/PANEL/administrators/add',
            'title' => 'Добавить администратора',
            'admin_only' => 1,
            'type' => 1,
            'need_auth' => 1,
            'active' => 1,
        ]);

        DB::table('menu')->insert([
            'order' => '5',
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
