<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
       
        $this->middleware(function($request,$next){
            if(session('success_message'))
            {
                Alert::success('Berhasil!',session('success_message'));
            }
            if(session('error_message'))
            {
                Alert::error('Berhasil!',session('error_message'));
            }
            return $next($request);
        });
        
    }
}
