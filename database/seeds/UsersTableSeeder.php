<?php

use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@site.ru',
            'password' => bcrypt('qwerty123'),
        ]);

        DB::table('users')->insert([
            'name' => 'User Vasya',
            'email' => 'Vasya@mail.ru',
            'role_id' => '4',
            'password' => bcrypt('qwerty123'),
        ]);

        DB::table('users')->insert([
            'name' => 'User Masha',
            'email' => 'Masha@mail.ru',
            'password' => bcrypt('qwerty123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Misha',
            'email' => 'misha@mail.ru',
            'password' => bcrypt('qwerty123'),
        ]);

    }
}
