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

    /* Админка */

    /* Требуется авторизация пользователя */
    Route::group(['namespace' => 'Back', 'middleware' => 'auth', 'prefix' => config('app.admin_panel_keyword')],function () {
        Route::get('/login', 'AuthAdminController@login')
        ->name('back.panel.login');
        Route::post('/login', 'AuthAdminController@loginPost')
            ->name('back.panel.loginPost');
        Route::get('/logout', 'AuthAdminController@logout')
            ->name('back.panel.logout');

        /* Требуется авторизация админа */
        Route::group(['middleware' => 'isAdmin'], function () {
            Route::get('/', 'AdminPanelController@index')
                ->name('back.panel');
        /* Администраторы */
            Route::get('/administrators/add', 'AuthAdminController@add')
                ->name('backAddAdministrator');
            Route::post('/administrators/add', 'AuthAdminController@addPost')
                ->name('backAddAdministratorPost');

        /* Статьи */
            Route::group(['prefix' => 'articles'], function () {
                Route::get('/', 'ArticlesController@index')
                    ->name('back.pages.articles.index');
                Route::get('/post:{id}', 'ArticlesController@article')
                    ->name('back.pages.articles.article');
                Route::get('/add', 'ArticlesController@add')
                    ->name('backAddArticle');
                Route::post('/add', 'ArticlesController@addPost')
                    ->name('backAddArticlePost');
                Route::get('/edit:{id}', 'ArticlesController@edit')
                    ->name('backEditArticle');
                Route::post('/edit:{id}', 'ArticlesController@editPost')
                    ->name('backEditArticlePost');
                Route::get('/delete:{id}', 'ArticlesController@delete')
                    ->name('backDdeleteArticle');
            });
        });
    });

    /* Клиентская часть */
    Route::group(['namespace' => 'Front'], function () {
        Route::get('/', 'PagesController@index')
            ->name('home');
        /* Статические страницы */
        Route::get('/about', 'PagesController@about')
            ->name('about');

        Route::get('/contacts', 'PagesController@contacts')
            ->name('contacts');

        /* Аторизация */
        Route::get('/login', 'AuthUserController@login')
            ->name('login');
        Route::post('/login', 'AuthUserController@loginPost')
            ->name('loginPost');

        Route::get('/logout', 'AuthUserController@logout')
            ->name('logout');

        /* Регистрация */
        Route::get('/register', 'AuthUserController@register')
            ->name('register');
        Route::post('/register', 'AuthUserController@registerPost')
            ->name('registerPost');


        /* Блог */

        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', 'ArticlesController@index')
                ->name('blog');
            Route::get('/post:{slug}', 'ArticlesController@article')
                ->name('article')
                ->where([
                    'slug' => '[А-я0-9A-z/-]+'
                ]);
        /* Действия со статьёй требующие авторизации под админом: */
        /*
           |----------------------------------------------------------------|
           |     - Доступно редактирование и удаление сущестующих статей    |
           |     - Добавление статей осуществляется через админку           |
           |----------------------------------------------------------------|
        */
            Route::group(['middleware' => 'isAdmin'], function () {
                Route::get('/edit:{id}', 'ArticlesController@edit')
                    ->name('editArticle');
                Route::post('/edit:{id}', 'ArticlesController@editPost')
                    ->name('editArticlePost');
                Route::get('/delete:{id}', 'ArticlesController@delete')
                    ->name('edeleteArticle');
            });

        });
    });


