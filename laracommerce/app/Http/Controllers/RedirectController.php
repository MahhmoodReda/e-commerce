<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function redirect()
    {
        if(Auth::check() && Auth::user()->type == 1)
        {
            return to_route('admin.home');
        }else{
            return to_route('user.home');
        }
    }


}
