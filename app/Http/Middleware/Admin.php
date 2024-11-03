<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() !== null && strtolower(auth()->user()->role) === "admin") {
            return $next($request);
        } else {
            return redirect('login')->with('msg', 'You are not allowed to access the Admin page. This may be because you\'re not logged in, or don\'t have the right permissions.');
        }
    }
}
