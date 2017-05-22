<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController
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
        $isAuth = false;
        return view('public.articles.index', ['msg' => false, 'articles' => $this->articles, 'page_title' => 'Главная']);
    }

    public function article($id = false)
    {
        $page_title = 'Статья';
        $msg = false;
        $isAuth = resolve('AuthModel')->isAuth();

        if(!$id){
           $msg = 'Такой статьи не существует!';
           $article = [];
        }else{
            $article = $this->articles[$id];
        }

        if(isset($article) && (!$article['private'] || ($article['private'] && $isAuth))){
            $page_title = $page_title. ': '. $article['title'];
        }else{
            $page_title = $page_title. ' не найдена';
            $article = [];
        }

        return view('public.articles.article', ['msg' => $msg, 'article' => $article, 'title' => $page_title]);
    }
}