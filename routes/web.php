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
Route::get('/', 'ArticlesController@index')
    ->name('home');

Route::get('/about', function () {
    return view('public.about', ['title' => 'О бологе'] );
});

Route::get('/contacts', function () {
    return view('public.contacts', ['title' => 'Контакты']);
});

Route::get('/login', function () {
    return view('public.auth', ['title' => 'Авторизация', 'mess_text' => '']);
});

Route::post('/login', function () {
    return var_dump($_POST);
});

Route::group(['prefix' => 'articles'], function () {
    Route::get('/all', 'ArticlesController@all');

    Route::get('/article/{id}', 'ArticlesController@article')
        ->where([
            'id' => '[0-9]+'
        ]);
});