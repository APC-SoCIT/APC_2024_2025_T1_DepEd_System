<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Check if the authenticated user has the role of 'teacher'
            if (auth()->user()->role === 'teacher') {
                return redirect()->route('dashboard-teacher');
            } elseif (auth()->user()->role === 'student') {
                return redirect()->route('dashboard-student');
            }
        }
        
        // If the user is not authenticated or not redirected, continue with the request
        return $next($request);
    }
}
