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
        $administrators = Admin::all();
        //dd($administrators);
        return view('back.pages.administrators.index', ['administrators' => $administrators, 'title' => 'Список администраторов']);
    }

    public function add()
    {

        $roles = Role::all();
        return view('back.pages.administrators.add', ['title' => 'Добавить администратора', 'roles' => $roles->sortByDesc('id')]);
    }

    public function addPost(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|unique:admins|max:100',
            'name' => 'required|max:255',
            'email' => 'required|email|max:200',
            'role_id' => 'required',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
        ]);

        $request->merge(['password' => bcrypt($request->input('password'))]);
        $admin = Admin::create($request->except(['_token', 'email']));
        try {
            $user = User::where('email', $request->input('email'))
                ->firstOrFail();
            $user->is_admin = 1;
            $user->admin_id = $admin->id;
            $user->save();

        } catch (\Exception $e) {
            $request->is_admin = 1;
            $request->admin_id = $admin->id;
            User::create($request->except(['_token', 'login', 'role_id']));
        }

        return redirect()
            ->route('back.pages.administrators.index')
            ->with('authSucces','Администратор добавлен');
    }

    public function edit($id)
    {
         try {
            $administrator = Admin::where('id', $id)
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit'));
        }
        $roles = Role::all();
        $title = 'Редактирование: '.$administrator->login;
        return view('back.pages.administrators.edit', compact(['administrator', 'title', 'roles']));
    }

    public function editPost($id, Request $request)
    {
        $this->authorize('edit', 'BookingPolicy');

        $this->validate($request, [
            'login' => 'required|unique:admins|max:100',
            'role_id' => 'required',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
        ]);

        $request->merge(['password' => bcrypt($request->input('password'))]);
        try {
            Admin::where('id', $id)
                ->update($request->except('_token'));
        } catch (\Exception $e) {
            abort(404, trans('custom.err_edit'));
        }

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
        /* защита задана в роутах*/
        try {
            Admin::destroy($id);
           $user =  User::find($id);
           $user->is_admin = 0;
           $user->admin_id = '';
           $user->save();

        } catch (\Exception $e) {
            abort(404, trans('custom.already_deleted'));
        }

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
