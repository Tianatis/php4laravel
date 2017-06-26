<?php

use Illuminate\Database\Seeder;

class RespondsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responds')->insert([
            'admin_id' => '1',
            'message_id' => '1',
            'respond' => ';)',
        ]);

        DB::table('responds')->insert([
            'admin_id' => '1',
            'message_id' => '4',
            'respond' => 'Если есть желание стать автором, пришлите образец вашего творчества на емейл администратору. Уточните, какие темы вы бы хотели освещать, и с какой переодичностью.',
        ]);

    }
}
