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

            Route::group(['middleware' => 'isAdministrator', 'prefix' =>'users'], function () {
                /* Пользователи */
                Route::get('/', 'UsersController@index')
                    ->name('back.pages.users.index');
                Route::get('/edit:{id}', 'UsersController@edit')
                    ->name('back.pages.users.edit');
                Route::post('/edit:{id}', 'UsersController@editPost')
                    ->name('back.pages.users.editPost');
                Route::get('/delete:{id}', 'UsersController@delete')
                    ->name('back.pages.users.delete');
                Route::get('/autor/set:{id}', 'UsersController@setAuthor')
                    ->name('back.pages.users.setAuthor');
                Route::get('/autor/unset:{id}', 'UsersController@unsetAuthor')
                    ->name('back.pages.users.unsetAuthor');

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
                    ->name('backDeleteArticle');
                Route::post('/post/{id}/comments/add', 'ArticlesController@addCommentPost')
                    ->name('back.pages.comments.addCommentPost');
                Route::get('/post/comments/delete:{id}', 'ArticlesController@deleteComment')
                    ->name('back.pages.comments.deleteComment');
                Route::get('/unpublished', 'ArticlesController@showUnpublished')
                    ->name('back.pages.articles.unpublished');
                Route::get('/trashed', 'ArticlesController@showTrashed')
                    ->name('back.pages.articles.trashed');
                Route::get('/restore:{id}', 'ArticlesController@restore')
                    ->name('backRestoreArticle');
                Route::get('/publish:{id}', 'ArticlesController@publish')
                    ->name('backPublishArticle');
                Route::get('/unpublish:{id}', 'ArticlesController@unpublish')
                    ->name('backUnublishArticle');
                Route::group(['middleware' => 'isSuperAdmin'], function () {
                    Route::get('/force:{id}', 'ArticlesController@forceDelete')
                        ->name('backforceDeleteArticle');
                });
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
            Route::get('/post:{slug}', 'ArticlesController@article')
                ->name('article')
                ->where([
                    'slug' => '[А-я0-9A-z/-]+'
                ]);
            Route::group(['middleware' => 'auth'], function () {
                Route::post('/post/{id}/comments/add', 'ArticlesController@addCommentPost')
                    ->name('front.pages.comments.addCommentPost');
                Route::get('/post/comments/delete:{id}', 'ArticlesController@deleteComment')
                    ->name('front.pages.comments.deleteComment');
            });
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

            Route::group(['middleware' => 'isAuthor'], function () {
                Route::get('/add', 'ArticlesController@add')
                    ->name('frontAddArticle');
                Route::post('/add', 'ArticlesController@addPost')
                    ->name('frontAddArticlePost');
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

        /* Поиск */

        Route::group(['prefix' => 'search'], function () {

            Route::post('/blog', 'SearchController@BlogPost')
                ->name('front.pages.search.blog');

        });

    });


