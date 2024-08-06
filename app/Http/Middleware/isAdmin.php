<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
//    public function handle(Request $request, Closure $next): Response
//    {
//        if (Auth::check() && Auth::user()->role == 'admin') {
//            return $next($request);
//        }
//        Auth::logout();
//        return to_route('dashboard.login');
//    }
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('admin')->check() || Auth::guard('admin')->user()->role !== 'admin') {
            if (Auth::guard('admin')->check()) {
                Auth::guard('admin')->logout();
            }
            Auth::guard('admin')->check();
            return to_route('dashboard.login');
        }
        return $next($request);
    }
}
