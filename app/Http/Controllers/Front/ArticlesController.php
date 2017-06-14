<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Article;
class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::all();
        return view('front.pages.articles.index', ['articles' => $articles, 'title' => 'Блог']);
    }

    public function article($slug)
    {
        $page_title = 'Статья';
        $article = Article::where('slug', 'post:' . $slug)->first();
        if(!$article)
            return redirect()->route('home')
               ->with('articleError','Такой статьи не существует!');
        if ($article->private && !Auth::check())
            return redirect()->route('login')
                ->with('authError','Необходима авторизация!');

        return view('front.pages.articles.article', ['article' => $article, 'title' => $page_title. ': '. $article['title']]);
    }
}