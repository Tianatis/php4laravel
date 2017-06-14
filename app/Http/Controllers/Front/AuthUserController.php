<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function login()
    {
        if(Auth::check()) {
            return redirect()
                ->route('home');
        }

        return view('front.pages.auth.login', ['title' => 'Авторизация', 'mess_text' => '']);
    }

    public function loginPost(Request $request)
    {
        $remember = $request->input('remember') ? true : false;

        $authResult = Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $remember);

        if ($authResult) {
            return redirect()
                ->route('home')
                ->with('response', [
                    'position' => 'top',
                    'text' => 'Вы успешно вошли в систему',
                    'type' => 'box',
                    'class' => 'r_success'
                ]);
        } else {
            return redirect()
                ->route('login')
                ->with('response', [
                    'position' => 'embed',
                    'text' => trans('custom.wrong_password'),
                    'type' => 'string',
                    'class' => 'r_error'
                ]);
        }
    }

    public function register()
    {
        if(Auth::check())
            return redirect()
                ->route('home');

        return view('front.pages.auth.register', ['title' => 'Регистрация', 'mess_text' => '']);
    }

    public function registerPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:200',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
        ]);

        DB::table('users')->insert([
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
            ->with('response', [
                'position' => 'top',
                'text' => 'Вы успешно прошли регистрацию. Добро пожаловать!',
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()
            ->route('home')
            ->with('response', [
                'position' => 'top',
                'text' => 'Вы вышли из системы. Возвращайтесь снова!',
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }
}
