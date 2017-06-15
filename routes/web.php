<?php
use Illuminate\Support\Facades\Route;
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


Route::get('blog/', function () {
    return 'articles';
});
Route::get('blog/page{num}', function ($num) {
    return "blog page №$num";
})->where([
    'num' => '[0-9]+'
]);
Route::get('blog/{slug}', function ($slug) {
    return "Статья: $slug";
})->where([
    'slug' => '[А-я0-9A-z/-]+'
]);

*/
Route::group(['namespace' => 'Back', 'middleware' => 'auth', 'prefix' => config('app.admin_panel_keyword')],function () {
    Route::get('/login', 'AuthAdminController@login')
    ->name('back.panel.login');
    Route::post('/login', 'AuthAdminController@loginPost')
        ->name('back.panel.loginPost');

    Route::group(['middleware' => 'isAdmin'], function () {
        Route::get('/', 'AdminPanelController@index')
            ->name('back.panel');
        // прочее

    });
});

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'PagesController@index')
        ->name('home');
    /* Статические страницы */
    Route::get('/about', 'PagesController@about');

    Route::get('/contacts', 'PagesController@contacts');

    /* Аторизация */
    Route::get('/login', 'AuthUserController@login')
        ->name('login');
    Route::post('/login', 'AuthUserController@loginPost')
        ->name('loginPost');

    Route::get('/register', 'AuthUserController@register')
        ->name('register');
    Route::post('/register', 'AuthUserController@registerPost')
        ->name('registerPost');

    Route::get('/logout', 'AuthUserController@logout')
        ->name('logout');

    /* Статьи */

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', 'ArticlesController@index');
        Route::get('/post:{slug}', 'ArticlesController@article')
            ->where([
                'slug' => '[А-я0-9A-z/-]+'
            ]);
        Route::get('/edit:{id}', 'ArticlesController@edite');
        Route::get('/delete:{id}', 'ArticlesController@delete');
    });
});


/* Добавление и редактирование статей через админку */