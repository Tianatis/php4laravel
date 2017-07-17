<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => '2',
            'article_id' => '1',
            'text' => ':)',
        ]);
        DB::table('comments')->insert([
            'user_id' => '3',
            'article_id' => '1',
            'parent_id' => '1',
            'text' => ':)))',
        ]);
        DB::table('comments')->insert([
            'user_id' => '1',
            'article_id' => '1',
            'parent_id' => '1',
            'text' => 'спам символами...',
        ]);
        DB::table('comments')->insert([
            'user_id' => '3',
            'article_id' => '1',
            'text' => 'интересно',
        ]);
        DB::table('comments')->insert([
            'user_id' => '4',
            'article_id' => '1',
            'parent_id' => '3',
            'text' => 'да ладно ;)',
        ]);
    }
}
