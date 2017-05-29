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
/* Статические страницы */
Route::get('/about', 'PagesController@about');

Route::get('/contacts', 'PagesController@contacts');

/* Аторизация */
Route::get('/login', 'AuthController@login')
    ->name('login');
Route::post('/login', 'AuthController@loginPost')
    ->name('loginPost');

Route::get('/register', 'AuthController@register')
    ->name('register');
Route::post('/register', 'AuthController@registerPost')
    ->name('registerPost');

Route::get('/logout', 'AuthController@logout')
    ->name('logout');

/* Статьи */

Route::group(['prefix' => 'articles'], function () {
    Route::get('/all', 'ArticlesController@all');

    Route::get('/article/{id}', 'ArticlesController@article')
        ->where([
            'id' => '[0-9]+'
        ]);
});

/* Добавление и редактирование статей через админку */