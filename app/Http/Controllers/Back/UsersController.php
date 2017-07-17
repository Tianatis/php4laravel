<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class UsersController extends Controller
{


    public function index()
    {
        $this->authorize('topAdminView', User::class);
        $users = User::all();
        return view('back.pages.users.index', ['users' => $users, 'title' => 'Список пользователей']);
    }

    public function edit($id)
    {
        $this->authorize('update', User::class);
        try {
            $user = User::where('id', $id)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit'));
        }
        $title = 'Редактирование: '.$user->name;
        return view('back.pages.users.edit', compact(['user', 'title']));
    }




    public function editPost($id, Request $request)
    {
        $this->authorize('update', User::class);

        $this->validate($request, [
            'name' => 'required|max:100',
            'password' => 'max:255|min:6',
            'password2' => 'same:password',
        ]);

        $request->merge(['password' => bcrypt($request->input('password'))]);

        User::where('id', $id)
                ->update($request->except(['_token', 'password2']));


        return redirect()
            ->route('back.pages.users.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_edit'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function setAuthor($id)
    {
        $this->authorize('update', User::class);

        User::where('id', $id)
            ->update(['is_author' => 1]);

        return redirect()
            ->route('back.pages.users.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_edit'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function unsetAuthor($id)
    {
        $this->authorize('update', User::class);

        User::where('id', $id)
            ->update(['is_author' => 0]);

        return redirect()
            ->route('back.pages.users.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_edit'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function delete($id)
    {
       $this->authorize('delete', User::class);

       User::destroy($id);

        return redirect()
            ->route('back.pages.users.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }




}
