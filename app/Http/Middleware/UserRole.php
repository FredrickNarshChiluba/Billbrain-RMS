<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //dd(auth()->user());
        if (Auth::check() && Auth::User()->role == 'Student') {
            return $next($request);
        } elseif (Auth::check() && Auth::User()->role == 'Accountant') {
            return $next($request);
        } elseif (Auth::check() && Auth::User()->role == 'Admin') {
            return $next($request);
        } elseif (Auth::check() && Auth::User()->role == 'Super User') {
            return $next($request);
        }

        return redirect('home')->with('error',"You don't have admin access.");
        
    }
}
