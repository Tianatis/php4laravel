<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Role;

class AdminsController extends Controller
{


    public function index()
    {
        $this->authorize('view', Admin::class);
        $administrators = Admin::all();
        return view('back.pages.administrators.index', ['administrators' => $administrators, 'title' => 'Список администраторов']);
    }

    public function add()
    {
        $this->authorize('view', Admin::class);
        $roles = Role::ofType('1')->get();
        return view('back.pages.administrators.add', ['title' => 'Добавить администратора', 'roles' => $roles->sortByDesc('id')]);
    }

    public function addPost(Request $request)
    {
        $this->authorize('create', Admin::class);

        $this->validate($request, [
            'login' => 'required|unique:admins|max:100',
            'name' => 'required|max:255',
            'email' => 'required|email|max:200',
            'role_id' => 'required',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
        ]);

        $request->merge(['password' => bcrypt($request->input('password'))]);

        try {
            $user = User::where('email', $request->input('email'))
                ->firstOrFail();
        } catch (\Exception $e) {

            $user = User::create($request->except(['_token', 'login', 'role_id', 'password2']));
        }

        $request->merge(['user_id' => $user->id]);

        Admin::create($request->except(['_token', 'email']));

        return redirect()
            ->route('back.pages.administrators.index')
            ->with('authSucces','Администратор добавлен');
    }

    public function edit($id)
    {
        $this->authorize('update', Admin::class);
        try {
            $administrator = Admin::where('id', $id)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit'));
        }
        $roles = Role::ofType('1')->get();
        $title = 'Редактирование: '.$administrator->login;
        return view('back.pages.administrators.edit', compact(['administrator', 'title', 'roles']));
    }

    public function editPost($id, Request $request)
    {
        $this->authorize('update', Admin::class);
        $this->validate($request, [
            'login' => 'required|max:100',
            'role_id' => 'required',
            'password' => 'max:255|min:6',
            'password2' => 'same:password',
        ]);

        $request->merge(['password' => bcrypt($request->input('password'))]);

        Admin::where('id', $id)
                ->update($request->except(['_token', 'password2']));


        return redirect()
            ->route('back.pages.administrators.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_edit'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function delete($id)
    {
       $this->authorize('delete', Admin::class);

       Admin::destroy($id);

        return redirect()
            ->route('back.pages.administrators.index')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.success_deleted'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }
}
