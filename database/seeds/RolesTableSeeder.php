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
            'full_name' => 'Администратор',
            'description' => 'Максимальные права доступа в системе. Может создавать и редактировать администраторов и использовать все функции остальных ролей.',
        ]);

        DB::table('roles')->insert([
            'name' => 'editor',
            'full_name' => 'Редактор',
            'description' => 'Может редактировать статьи других авторов. Имеет доступ в панель администрирования. Может использовать все функции роли Автор.',
        ]);

        DB::table('roles')->insert([
            'name' => 'author',
            'full_name' => 'Автор',
            'description' => 'Может добавлять статьи на сайте. Может редактировать свои статьи. Не имеет доступа в панель администрирования. Может использовать все функции роли Пользователь.',
        ]);

        DB::table('roles')->insert([
            'name' => 'user',
            'full_name' => 'Пользователь',
            'description' => 'Может читать приватные статьи на сайте. Может оставлять сообщения.',
        ]);
    }
}
