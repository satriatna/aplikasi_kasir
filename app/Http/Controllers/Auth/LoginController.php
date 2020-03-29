<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function username()
    {
        return 'username';
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticated()
    {
        if(Auth::user()->level == 'admin')
        {
            return redirect('/dashboard_admin');
        }
        else if (Auth::user()->level == 'waiter')
        {
            return redirect('/dashboard_waiter');
        }
        else if (Auth::user()->level == 'kasir')
        {
            return redirect('/dashboard_kasir');
        }
        else if (Auth::user()->level == 'owner')
        {
            return redirect('/dashboard_owner');
        }
        else
        {
            return redirect('/dashboard_pelanggan');
        }
    }
}
