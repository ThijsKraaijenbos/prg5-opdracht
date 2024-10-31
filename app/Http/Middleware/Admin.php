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
            abort(403);
        }
    }
}
