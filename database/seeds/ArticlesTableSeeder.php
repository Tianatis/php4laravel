<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 6; $i++) {
            $priv = !($i % 2) ? 0 : 1;
            DB::table('articles')->insert([
                'title' => str_random(10),
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'intro' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'post-date' => Carbon::now()->format('Y-m-d H:i:s'),
                'private' => $priv,
            ]);
        }
    }

}
