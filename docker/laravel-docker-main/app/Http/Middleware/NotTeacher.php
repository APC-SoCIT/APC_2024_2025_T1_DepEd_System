<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotTeacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            if (auth()->user()->role === 'teacher') {
                // Proceed with the request
                return $next($request);
            }elseif (auth()->user()->role === 'student'){
                // Redirect to student dashboard
                return redirect()->route('dashboard-student');
            }
        }else{
            return redirect()->route('login');
        }
        
    }
}
