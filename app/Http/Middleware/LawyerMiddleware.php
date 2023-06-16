<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class LawyerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_name === 'محامي')
        {
            return $next($request);
        }

       elseif (Auth::check() && Auth::user()->role_name==='زبون')

        {
            return redirect()->route('dashboard.client');
        }
        
        elseif (Auth::check() &&  Auth::user()->role_name ==='سكرتاريا')

        {
            return redirect()->route('dashboard.secretaria');
        }
    
      
    }
}
