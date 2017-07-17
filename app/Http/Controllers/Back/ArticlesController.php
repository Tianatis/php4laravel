<?php
namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')
            ->published()
            ->paginate(10);
        return view('back.pages.articles.index', ['articles' => $articles, 'title' => 'Блог', 'type' => 'published']);
    }

    public function showUnpublished()
    {
        $articles = Article::orderBy('id', 'DESC')
            ->unpublished()
            ->paginate(10);
        return view('back.pages.articles.index', ['articles' => $articles, 'title' => 'Блог', 'type' => 'unpublished']);
    }

    public function showTrashed()
    {
        $articles = Article::onlyTrashed()
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return view('back.pages.articles.index', ['articles' => $articles, 'title' => 'Блог', 'type' => 'trashed']);
    }

    public function article($id)
    {
        try {
            $article = Article::where('id', $id)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_article'));
        }

        $title = $article->title;
        return view('back.pages.articles.article', compact(['article', 'title']));
    }

    public function add()
    {
        $this->authorize('create', Article::class);
        return view('back.pages.articles.add', ['title' => 'Добавление статьи']);
    }

    public function addPost(Request $request)
    {
        $this->authorize('create', Article::class);
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|min:5',
        ]);
        $request->merge(['user_id' => Auth::user()->id]);
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
        $this->authorize('update', Article::class);
        try {
            $article = Article::where('id', $id)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit_article'));
        }
        $title = 'Редактирование: '.$article->title;
        return view('back.pages.articles.edit', compact(['article', 'title']));
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

        $this->authorize('delete', Article::class);

        Article::destroy($id);


        return redirect()
            ->route('back.pages.articles.index')
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
            ->route('back.pages.articles.article', ['id' => $article->id])
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_add'),
                'type' => 'box',
                'class' => 'r_success'
            ]);



    }

    public function deleteComment($id)
    {
        $this->authorize('delete', Comment::class);

        try {
            $comment = Comment::findOrFail($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.already_deleted'));
        }

        Comment::destroy($id);

        return redirect()
            ->route('back.pages.articles.article', ['id' => $comment->article->id])
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);

    }

    public function restore($id)
    {
        $this->authorize('update', Article::class);

        try {
            $article = Article::findOrFail($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.already_deleted'));
        }

        $article->restore();

        return redirect()
            ->route('back.pages.articles.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_restore'),
                'type' => 'box',
                'class' => 'r_success'
            ]);

    }

    public function forceDelete($id)
    {

        $this->authorize('forceDelete', Article::class);

        Article::where('id', $id)->forceDelete();


        return redirect()
            ->route('back.pages.articles.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.article_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function publish($id)
    {
        $this->authorize('update', Article::class);

        try {
            $article = Article::findOrFail($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.already_deleted'));
        }

        $article->update(['published' => 1]);

        return redirect()
            ->route('back.pages.articles.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_publish'),
                'type' => 'box',
                'class' => 'r_success'
            ]);

    }

    public function unpublish($id)
    {
        $this->authorize('update', Article::class);

        try {
            $article = Article::findOrFail($id);
        } catch (\Exception $e) {
            abort(404, trans('custom.already_deleted'));
        }

        $article->update(['published' => 0]);

        return redirect()
            ->route('back.pages.articles.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_unpublish'),
                'type' => 'box',
                'class' => 'r_success'
            ]);

    }
}