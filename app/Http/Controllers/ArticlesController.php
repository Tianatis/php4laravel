<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    private $articles = [
                            1 => [
                                    'private' => 0,
                                    'id' => 1,
                                    'title' => 'Lorem ipsum',
                                    'intro' => 'Lorem ipsum dolor sit amet',
                                    'name' => 'Admin',
                                    'post_date' => '2017-02-08 14:43:27',
                                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pretium ut ipsum eu tincidunt.'
                            ],

                            2 => [
                                    'private' => 1,
                                    'id' => 2,
                                    'title' => 'Lorem ipsum 2',
                                    'intro' => 'Lorem ipsum dolor sit amet',
                                    'name' => 'Admin',
                                    'post_date' => '2017-02-09 14:43:27',
                                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pretium ut ipsum eu tincidunt.'
                            ]
                        ];
    public function index()
    {
       return $this->all();
    }

    public function all()
    {
        $menu = resolve('MenuModel')->showMenu(Auth::check());
        return view('public.articles.index', ['articles' => $this->articles, 'menu' => $menu, 'page_title' => 'Главная']);
    }

    public function article($id)
    {
        $page_title = 'Статья';
        $menu = resolve('MenuModel')->showMenu(Auth::check());

        if(!isset($this->articles[$id]))
            return redirect()->route('home')
                ->with('articleError','Такой статьи не существует!');

        $article = $this->articles[$id];

        if ($article['private'] && !Auth::check())
            return redirect()->route('login')
                ->with('authError','Необходима авторизация!');

        return view('public.articles.article', ['article' => $article, 'menu' => $menu, 'title' => $page_title. ': '. $article['title']]);
    }
}