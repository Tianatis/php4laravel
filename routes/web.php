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
            Route::group(['middleware' => 'isSuperAdmin', 'prefix' =>'administrators'], function () {
            /* Администраторы */
                Route::get('/', 'AdminsController@index')
                    ->name('back.pages.administrators.index');
                Route::get('/add', 'AdminsController@add')
                    ->name('back.pages.administrators.add');
                Route::post('/add', 'AdminsController@addPost')
                    ->name('back.pages.administrators.addPost');
                Route::get('/edit:{id}', 'AdminsController@edit')
                    ->name('back.pages.administrators.edit');
                Route::post('/edit:{id}', 'AdminsController@editPost')
                    ->name('back.pages.administrators.editPost');
                Route::get('/delete:{id}', 'AdminsController@delete')
                    ->name('back.pages.administrators.delete');
            });


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
        /* Сообщения */


        Route::group(['prefix' => 'messages'], function () {

            Route::get('/', 'MessagesController@index')
                ->name('back.pages.messages.index');
            Route::get('/message:{id}', 'MessagesController@message')
                ->name('back.pages.messages.message');
            Route::get('/delete:{id}', 'MessagesController@delete')
                ->name('back.pages.messages.delete');
            Route::get('/{id}/add:respond', 'MessagesController@respond')
                ->name('back.pages.messages.add.respond');
            Route::post('/{id}/add:respond', 'MessagesController@respondPost')
                ->name('back.pages.messages.add.respondPost');
            Route::get('/{id}/edit:respond', 'MessagesController@editRespond')
                ->name('back.pages.messages.edit.respond');
            Route::post('/{id}/edit:respond', 'MessagesController@editRespondPost')
                ->name('back.pages.messages.edit.respondPost');
            Route::get('/{id}/delete:respond', 'MessagesController@deleteRespond')
                ->name('back.pages.messages.delete.respond');


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
        Route::post('/contacts', 'PagesController@contactsPost')
            ->name('contactsPost');

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
            Route::get('/post{id}:{slug}', 'ArticlesController@article')
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
                    ->name('deleteArticle');
            });

        });

        /* Сообщения */

        Route::group(['prefix' => 'messages'], function () {
            Route::get('/', 'MessagesController@index')
                ->name('front.pages.messages');
            Route::post('/', 'MessagesController@addPost')
                ->name('front.pages.massagePost');
            Route::group(['middleware' => 'isAdmin'], function () {
                Route::get('/delete:{id}', 'MessagesController@delete')
                    ->name('front.pages.messages.delete');
                Route::post('/{id}/add:respond', 'MessagesController@respondPost')
                    ->name('front.pages.messages.add.respondPost');
                Route::get('/{id}/delete:respond', 'MessagesController@deleteRespond')
                    ->name('front.pages.messages.delete.respond');
            });


        });


    });


