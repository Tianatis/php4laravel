<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return View::make('index', ['msg' => false, 'articles' => [], 'auth' => 0, 'page_title' => 'Главная', 'menu' => []] );
});

Route::get('/about', function () {
    return view('about', ['title' => 'О бологе'] );
});

Route::get('/contacts', function () {
    return view('contacts', ['title' => 'Контакты']);
});

Route::get('/login', function () {
    return view('auth', ['title' => 'Авторизация', 'mess_text' => '']);
});

Route::post('/login', function () {
    return print_r($_POST);
});

