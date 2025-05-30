<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role_as == "1"){
                return $next($request);
            }else{
                return redirect()->route('login')->withErrors('You are not allowed to access this page');
            }
        }else{
            return redirect()->route('login')->withErrors('Please login to access this page');
        }
    }
}
