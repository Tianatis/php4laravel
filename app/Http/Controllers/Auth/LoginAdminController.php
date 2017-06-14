<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | Login Admin Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating admins for the application and
     | redirecting them to your admin panel. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '';
    protected $redirectAfterLogout = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = config('app.admin_panel_keyword');
        $this->redirectAfterLogout = config('app.admin_panel_keyword');
        $this->middleware('guest')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
