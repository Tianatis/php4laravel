<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
class ArticlesController extends Controller
{

    public function index()
    {
        $title = 'Блог';
        $articles = Article::orderBy('id', 'DESC')
        ->published()
        ->paginate(5);

        return view('front.pages.articles.index', compact(['articles', 'title']));
    }

    public function article($slug)
    {
        try {
            $article = Article::where('slug', $slug)
                ->published()
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

    public function add()
    {
        $this->authorize('add_for_view', Article::class);
        return view('front.pages.articles.add', ['title' => 'Добавление статьи на просмотр']);
    }

    public function addPost(Request $request)
    {
        $this->authorize('add_for_view', Article::class);
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|min:5',
        ]);
        $request->merge(['user_id' => Auth::user()->id]);
        $request->merge(['slug' => str_slug($request->input('title'), '-')]);
        $request->merge(['intro' => intro($request->input('content'))]);
        $request->merge(['private' => $request->input('private') ? true : false]);
        $request->merge(['published' => 0]);

        Article::create($request->except('_token'));

        return redirect()
            ->route('blog')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_add'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }




    public function edit($id)
    {
        $this->authorize('update', Article::class);
        try {
            $article = Article::where('id', $id)
                ->published()
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit_article'));
        }
        $title = 'Редактирование: '.$article->title;
        return view('front.pages.articles.edit', compact(['article', 'title']));
    }

    public function editPost($id, Request $request)
    {
        $this->authorize('update', Article::class);
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|min:5',
        ]);

        $request->merge(['private' => $request->input('private') ? true : false]);

        Article::where('id', $id)
               ->update($request->except('_token'));

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
        $this->authorize('delete', Article::class);

        Article::destroy($id);

        return redirect()
            ->route('home')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.article_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function addCommentPost(Request $request, $id)
    {
        $this->authorize('create', Comment::class);

        try {
            $article = Article::findOrFail($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit'));
        }

        $this->validate($request, [
            'text' => 'required|min:3',
            'parent_id' => 'integer'
        ]);
        $request->merge(['user_id' => Auth::user()->id]);
        $request->merge(['article_id' => $id]);


        Comment::create($request->except('_token'));

        return redirect()
            ->route('article', ['slug' => $article->slug, 'id' => $article->id])
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_add'),
                'type' => 'box',
                'class' => 'r_success'
            ]);



    }

    public function deleteComment($id)
    {
        try {
            $comment = Comment::findOrFail($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.already_deleted'));
        }

        $this->authorize('delete', $comment);

        Comment::destroy($id);

        return redirect()
            ->route('article', ['slug' => $comment->article->slug, 'id' => $comment->article->id])
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);

    }


}