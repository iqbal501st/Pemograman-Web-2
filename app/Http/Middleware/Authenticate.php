<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // User is not authenticated, redirect to login page
            return redirect()->route('login');
        }

        // User is authenticated, proceed to the next middleware or route handler
        return $next($request);
    }
}
