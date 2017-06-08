<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $isAuth = Auth::check();
        if($isAuth)
            return redirect()
                ->route('home');

        $menu = resolve('MenuModel')->showMenu($isAuth);
        return view('public.pages.auth.login', ['title' => 'Авторизация', 'menu' => $menu, 'mess_text' => '']);
    }

    public function loginPost(Request $request)
    {
        $remember = $request->input('remember') ? true : false;

        $authResult = Auth::attempt([
            'login' => $request->input('login'),
            'password' => $request->input('password'),
        ], $remember);

        if ($authResult) {
            return redirect()
                ->route('home')
                ->with('authSucces', 'Вы успешно вошли в систему');
        } else {
            return redirect()
                ->route('login')
                ->with('authError', trans('custom.wrong_password'));
        }
    }

    public function register()
    {
        $isAuth = Auth::check();
        if($isAuth)
            return redirect()
                ->route('home');

        $menu = resolve('MenuModel')->showMenu($isAuth);
        return view('public.pages.auth.register', ['title' => 'Регистрация', 'menu' => $menu, 'mess_text' => '']);
    }

    public function registerPost(Request $request)
    {
        $this->validate($request, [
            'login' => 'required|max:100',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:200',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
        ]);

        DB::table('users')->insert([
            'login' => $request->input('login'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'created_at' => Carbon::createFromTimestamp(time())
                ->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::createFromTimestamp(time())
                ->format('Y-m-d H:i:s'),
        ]);

        return redirect()
            ->route('home')
            ->with('authSucces','Вы успешно прошли регистрацию');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()
            ->route('home')
            ->with('authSucces','Вы успешно разлогинены');
    }
}
