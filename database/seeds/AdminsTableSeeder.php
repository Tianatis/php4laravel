<?php

use Illuminate\Database\Seeder;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'login' => 'Admin',
            'role_id' => '1',
            'password' => bcrypt('qwerty123'),
        ]);
    }
}
