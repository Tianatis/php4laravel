<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
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
            'id' => Auth::user()->admin_id
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

    public function logout()
    {
        Auth::guard('admins')->logout();

        return redirect()
            ->route('home')
            ->with('authSucces','Вы вышли из системы');
    }

}
