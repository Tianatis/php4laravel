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
        $title = 'Блог';
        $articles = Article::orderBy('id', 'DESC')
        ->paginate(5);

        return view('front.pages.articles.index', compact(['articles', 'title']));
    }

    public function article($id, $slug)
    {
        try {
            $article = Article::where('slug', "post$id:$slug")
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_article'));
        }

        if ($article->private && !Auth::check()){
            abort(403, trans('custom.view_need_auth'));
         }

        $title = $article->title;
        return view('front.pages.articles.article', compact(['article', 'title']));
    }

    public function edit($id)
    {
        try {
            $article = Article::where('id', $id)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit_article'));
        }
        $title = 'Редактирование: '.$article->title;
        return view('front.pages.articles.edit', compact(['article', 'title']));
    }

    public function editPost($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|min:5',
        ]);

        $request->merge(['private' => $request->input('private') ? true : false]);
        /* надо переделывать проверку, т.к на удалённую статью всё равно пишет,
         что она успешно отредактирована и это без мягкого удаления! */
        try {
            Article::where('id', $id)
               // ->update($request->except('_token'));
               ->update($request->except('_token'));
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit_article'));
        }

        return redirect()
            ->route('blog')
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
            Article::destroy($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.article_already_deleted'));
        }

        return redirect()
            ->route('home')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.article_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }
}