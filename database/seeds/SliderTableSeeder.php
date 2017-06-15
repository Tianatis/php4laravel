<?php

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider')->insert([
            'src' => 'herbe.jpg',
            'text' => 'На нашем блоге!',
        ]);

        DB::table('slider')->insert([
            'src' => 'herbe2.jpg',
            'text' => 'Здесь мы изучаем Laravel',
        ]);

        DB::table('slider')->insert([
            'src' => 'herbe3.jpg',
            'text' => 'Читайте статьи',
        ]);

        DB::table('slider')->insert([
            'src' => 'flowers.jpg',
            'text' => 'Регистрируйтесь',
        ]);

        DB::table('slider')->insert([
            'src' => 'leaves.jpg',
            'text' => 'Оставляйте комментарии',
        ]);

        DB::table('slider')->insert([
            'src' => 'leaves2.jpg',
            'text' => 'Пишите сообщения',
        ]);

        DB::table('slider')->insert([
            'src' => 'flowers2.jpg',
            'text' => 'Наслаждайтесь жизнью :-)',
        ]);
    }
}
