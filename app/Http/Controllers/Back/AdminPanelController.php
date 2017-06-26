<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Admin;
use App\Models\User;
class AdminPanelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Панель администратора';
        //Всего статей на сайте:
        $count_articles = Article::all()->count();
        //Публичных статей:
        $count_public_articles = Article::public()->count();
        //Приватных статей:
        $count_private_articles = Article::private()->count();
        //Пользователей на сайте:
        $count_users = User::all()->count();

       // Добавлена статья:
        $last_article = Article::lastAdded()
            ->orderBy('id', 'DESC')
            ->first();
        //Изменена статья:
        $last_updated_article =  Article::lastUpdated()
            ->orderBy('id', 'DESC')
            ->first();
        //Зарегистрирован пользователь:
        $last_user = User::lastUser()
            ->orderBy('id', 'DESC')
            ->first();

        return view('back.pages.index', compact([
            'title',
            'count_articles',
            'count_public_articles',
            'count_private_articles',
            'count_users',
            'last_article',
            'last_updated_article',
            'last_user',
        ]));
    }


}
