<?php
namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Article;
class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::all();
        return view('back.pages.articles.index', ['articles' => $articles, 'title' => 'Блог']);
    }

    public function article($id)
    {
        try {
            $article = Article::where('id', $id)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_article'));
        }

        if ($article->private && !Auth::check()){
            abort(403, trans('custom.view_need_auth'));
         }

        $title = $article['title'];
        return view('back.pages.articles.article', compact(['article', 'title']));
    }

    public function add()
    {
        return view('back.pages.articles.add', ['title' => 'Добавление статьи']);
    }

    public function addPost(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|min:5',
        ]);
        $request->merge(['slug' => str_slug($request->input('title'), '-')]);
        $request->merge(['intro' => intro($request->input('content'))]);
        $request->merge(['private' => $request->input('private') ? true : false]);

        Article::create($request->except('_token'));

        return redirect()
            ->route('back.pages.articles.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_add'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function edit($id)
    {
        try {
            $article = Article::where('id', $id)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit_article'));
        }
        $title = 'Редактирование: '.$article['title'];
        return view('back.pages.articles.edit', compact(['article', 'title']));
    }

    public function editPost($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|min:5',
        ]);

        $request->merge(['private' => $request->input('private') ? true : false]);

        try {
             Article::where('id', $id)
            ->update($request->except('_token'));

        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit_article'));
        }
        Article::where('id', $id)
            ->update($request->except('_token'));
        return redirect()
            ->route('back.pages.articles.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_edit'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function delete($id)
    {
        /* защита задана в роутах*/
        try {
            Article::where('id', $id)
                ->delete();
        } catch (\Exception $e) {
            abort(404, trans('custom.article_already_deleted'));
        }

        return redirect()
            ->route('back.pages.articles.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.article_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }
}