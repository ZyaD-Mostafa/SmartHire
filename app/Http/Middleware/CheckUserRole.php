<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle($request, Closure $next, ...$guards)
{
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect('/');
        } else {
            Session::flash();
            return redirect('/login');
        }
    }

    return $next($request);
}
}
