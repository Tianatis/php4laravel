<?php

namespace App\Http\Controllers\Front;

use App\Models\Article;
use App\Models\Slider;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')
            ->paginate(5);
        $slides = Slider::all();
        $title = 'Главная';
        return view('front.pages.index', compact(['articles', 'title', 'slides']));
    }

    public function about()
    {
        $title = 'О бологе';
        $content = '<p>Этот блог создан в рамках курса PHP Strong (PHP4)</p>';

        return view('front.pages.about', compact(['content', 'title']));
    }

    public function contacts()
    {
        $title = 'Контакты';
        $content = '<p>Где-то на бескрайних просторах инета</p>';

        return view('front.pages.contacts', compact(['content', 'title']));

    }
}
