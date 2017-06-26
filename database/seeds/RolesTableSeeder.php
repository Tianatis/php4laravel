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
            'full_name' => 'Владелец',
            'description' => 'Максимальные права доступа в системе. Может создавать и редактировать администраторов и использовать все функции остальных ролей.',
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'full_name' => 'Администратор',
            'description' => 'Может отвечать на сообщения. Может использовать все функции роли Редактор.',
        ]);

        DB::table('roles')->insert([
            'name' => 'editor',
            'full_name' => 'Редактор',
            'description' => 'Может редактировать статьи других авторов. Имеет доступ в панель администрирования. Может использовать все функции роли Автор.',
        ]);
    }
}
