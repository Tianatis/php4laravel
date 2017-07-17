<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenuRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Menu::find(1)->role()->attach([1,2,3,4,5,6]); //Главная
        Menu::find(2)->role()->attach([1,2,3,4,5,6]); //Блог
        Menu::find(3)->role()->attach([1,2,3,4,5,6]); //Сообщения
        Menu::find(4)->role()->attach([1,2,3,4,5,6]); //О блоге
        Menu::find(5)->role()->attach([1,2,3,4,5,6]); //Контакты
        Menu::find(6)->role()->attach([1,2,3]); //Админка
        Menu::find(7)->role()->attach([4]); //Добавить статью
        Menu::find(8)->role()->attach([6]); //Авторизация
        Menu::find(9)->role()->attach([1,2,3,4,5]); //Выход
        Menu::find(10)->role()->attach([6]); //Регистрация
        Menu::find(11)->role()->attach([1,2,3]); //PANEL Обзор
        Menu::find(12)->role()->attach([1,3]); //PANEL Статьи
        Menu::find(13)->role()->attach([1]); //PANEL Aдмины
        Menu::find(14)->role()->attach([1,2]); //PANEL Сообщения
        Menu::find(15)->role()->attach([1,2]); //PANEL Пользователи
        Menu::find(16)->role()->attach([1,2,3]); //PANEL Сайт
        Menu::find(17)->role()->attach([1,2,3]); //PANEL Выход



    }
}
