<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthUserController extends Controller
{
    public function login()
    {
        if(Auth::check()) {
            return redirect()
                ->route('home');
        }

        return view('front.pages.auth.login', ['title' => 'Авторизация']);
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
                    'text' => trans('custom.auth_success'),
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

        return view('front.pages.auth.register', ['title' => 'Регистрация']);
    }

    public function registerPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:200',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
        ]);

        $request->merge(['password' => bcrypt($request->password)]);

        User::create($request->except('_token'));

        return redirect()
            ->route('home')
            ->with('response', [
                'position' => 'top',
                'text' => trans('custom.register_success'),
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
                'text' => trans('custom.logout_success'),
                'type' => 'box',
                'class' => 'r_success'
            ]);
    }
}
