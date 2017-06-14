<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Slider;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $slides = Slider::all();
        return view('front.pages.index', ['articles' => $articles, 'slides' => $slides, 'title' => 'Главная']);
    }

    public function about()
    {
        return view('front.pages.about', ['title' => 'О бологе', 'content' => '<p>Этот блог создан в рамках курса PHP Strong (PHP4)</p>']);
    }

    public function contacts()
    {
        return view('front.pages.contacts', ['title' => 'Контакты', 'content' => '<p>Где-то на бескрайних просторах инета</p>']);

    }
}
