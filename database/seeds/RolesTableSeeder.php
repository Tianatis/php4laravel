<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'superadmin',
            'type' => '1',
            'full_name' => 'Владелец',
            'description' => 'Максимальные права доступа в системе. Может создавать и редактировать администраторов и использовать все функции остальных ролей.',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'type' => '1',
            'full_name' => 'Администратор',
            'description' => 'Может отвечать на сообщения. Может использовать все функции роли Редактор.',
        ]);

        DB::table('roles')->insert([
            'name' => 'editor',
            'type' => '1',
            'full_name' => 'Редактор',
            'description' => 'Может редактировать статьи других авторов. Имеет доступ в панель администрирования. Может использовать все функции роли Автор.',
        ]);

        DB::table('roles')->insert([
            'name' => 'author',
            'type' => '2',
            'full_name' => 'Автор',
            'description' => 'Может добавлять статьи на просмотрю Может использовать все функции роли Пользователь.',
        ]);

        DB::table('roles')->insert([
            'name' => 'user',
            'type' => '2',
            'full_name' => 'Пользователь',
            'description' => 'Может писать сообщения и видеть приватные статьи. Может использовать все функции роли гость.',
        ]);

        DB::table('roles')->insert([
            'name' => 'guest',
            'type' => '2',
            'full_name' => 'Гость',
            'description' => 'Может читать стати.',
        ]);
    }
}
