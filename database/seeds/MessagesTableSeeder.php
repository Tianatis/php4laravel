<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'user_id' => '3',
            'message' => ':)',
        ]);

        DB::table('messages')->insert([
            'user_id' => '4',
            'message' => 'Laravel - круть!',
        ]);

        DB::table('messages')->insert([
            'user_id' => '2',
            'message' => 'Lumen тоже!',
        ]);

        DB::table('messages')->insert([
            'user_id' => '3',
            'message' => 'А как можно стать автором?',
        ]);


    }
}
