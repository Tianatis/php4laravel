<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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


