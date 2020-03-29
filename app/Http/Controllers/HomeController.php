<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->level == 'admin')
        {
            return redirect('/dashboard_admin');
        }
        else if(Auth::user()->level == 'waiter')
        {
            return redirect('/dashboard_waiter');
        }
        
        else if(Auth::user()->level == 'owner')
        {
            return redirect('/dashboard_owner');
        }
        
        else if(Auth::user()->level == 'kasir')
        {
            return redirect('/dashboard_kasir');
        }
        
        else if(Auth::user()->level == 'pelanggan')
        {
            return redirect('/dashboard_pelanggan');
        }
    }
}
