<?php

use Illuminate\Database\Seeder;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 16; $i++) {
            $priv = !($i % 4) ? 1 : 0;
            $title = $faker->realText(50);
            DB::table('articles')->insert([
                'title' => $title,
                'tagline' => $faker->realText(30),
                'slug' => 'post:' . str_slug($title, '-'),
                'content' => $faker->realText(1024),
                'intro' => $faker->realText(300),
                'private' => $priv,
            ]);
        }
    }

}
