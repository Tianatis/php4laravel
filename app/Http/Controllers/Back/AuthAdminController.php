<?php

namespace App\Http\Controllers\Back;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthAdminController extends Controller
{
    public function login()
    {
        if (Auth::guard('admins')->check()) {
                return redirect()
            ->route('back.panel');
        }
        return view('back.pages.auth.login', ['title' => 'Авторизация', 'mess_text' => '']);
    }

    public function loginPost(Request $request)
    {

        $remember = $request->input('remember') ? true : false;

        $authResult = Auth::guard('admins')->attempt([
            'login' => $request->input('login'),
            'password' => $request->input('password'),
        ], $remember);

        if ($authResult) {
            return redirect()
                ->route('back.panel')
                ->with('authSucces', 'Вы успешно вошли в систему');
        } else {
            return redirect()
                ->route('back.panel.login')
                ->with('authError', trans('custom.wrong_password'));
        }
    }

    public function add()
    {
        if(Auth::guard('admins')->check())
            return redirect()
                ->route('back.panel');

        return view('back.pages.auth.add', ['title' => 'Регистрация', 'mess_text' => '']);
    }

    public function addPost(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|max:100',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:200',
            'role' => 'required',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
        ]);

        DB::table('admins')->insert([
            'login' => $request->input('login'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' =>  $request->input('role'),
            'password' => bcrypt($request->input('password')),
            'created_at' => Carbon::createFromTimestamp(time())
                ->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::createFromTimestamp(time())
                ->format('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->route('back.panel')
            ->with('authSucces','Администратор добавлен');
    }

    public function logout()
    {
        Auth::guard('admins')->logout();

        return redirect()
            ->route('back.panel.login')
            ->with('authSucces','Вы вышли из системы');
    }

}
