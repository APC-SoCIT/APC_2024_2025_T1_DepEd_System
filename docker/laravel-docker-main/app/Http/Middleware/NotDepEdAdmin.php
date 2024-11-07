<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotDepEdAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if (auth()->user()->role === 'admin') {
                // Proceed with the request
                return $next($request);
            }elseif (auth()->user()->role === 'teacher'){
                // Redirect to teacher dashboard
                return redirect()->route('dashboard-teacher');
            }
            elseif (auth()->user()->role === 'student'){
                // Redirect to admin dashboard
                return redirect()->route('dashboard-student');
            }
        }else{
            return redirect()->route('login');
        }
        
    }
}
