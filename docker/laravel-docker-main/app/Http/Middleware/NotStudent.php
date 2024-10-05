<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if (auth()->user()->role === 'student') {
                // Proceed with the request
                return $next($request);
            }elseif (auth()->user()->role === 'teacher'){
                // Redirect to teacher dashboard
                return redirect()->route('dashboard-teacher');
                }
        }else{
            return redirect()->route('login');
        }
        
    }
}
