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
            'name' => 'User Vasya',
            'email' => 'Vasya@mail.ru',
            'password' => bcrypt('qwerty123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Tatiana Maltseva',
            'email' => 'lin321@mail.ru',
            'role' => '1',
            'password' => bcrypt('qwerty123'),
        ]);
    }
}
