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
    return view('index', ['msg' => false, 'articles' => [], 'auth' => 0, 'page_title' => 'Главная', 'menu' => App\Http\Controllers\MenuController::get_menu()
    ]);
})
    ->name('home');
Route::get('/about', function () {
    return view('about', ['title' => 'О бологе', 'menu' => App\Http\Controllers\MenuController::get_menu()] );
});

Route::get('/contacts', function () {
    return view('contacts', ['title' => 'Контакты', 'menu' => App\Http\Controllers\MenuController::get_menu()]);
});

Route::get('/login', function () {
    return view('auth', ['title' => 'Авторизация', 'mess_text' => '', 'menu' => App\Http\Controllers\MenuController::get_menu()]);
});

Route::post('/login', function () {
    return var_dump($_POST);
});

Route::group(['prefix' => 'articles', 'namespace' => 'Articles'], function () {
    Route::get('/', 'ArticlesController@index')
        ->name('home');

    Route::group(['prefix' => 'api', 'namespace' => 'Api'], function () {
        Route::get('/', 'AdminApiController@index');
    });
});