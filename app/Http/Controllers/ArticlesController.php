<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
class ArticlesController extends Controller
{

    public function index()
    {
       return $this->all();
    }

    public function all()
    {
        $articles = Article::all();
        $menu = resolve('MenuModel')->showMenu(Auth::check());
        return view('public.pages.articles.all', ['articles' => $articles, 'menu' => $menu, 'title' => 'Главная']);
    }

    public function article($id)
    {
        $page_title = 'Статья';
        $menu = resolve('MenuModel')->showMenu(Auth::check());
        $article = Article::where('id', $id)->first();
        if(!$article)
            return redirect()->route('home')
                ->with('articleError','Такой статьи не существует!');
        if ($article->private && !Auth::check())
            return redirect()->route('login')
                ->with('authError','Необходима авторизация!');

        return view('public.pages.articles.article', ['article' => $article, 'menu' => $menu, 'title' => $page_title. ': '. $article['title']]);
    }
}