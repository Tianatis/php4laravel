<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(RespondsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(MenuRolesTableSeeder::class);
    }
}
