<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        \Log::info('Middleware CheckRole triggered for request path: ' . $request->path());
    
        if (!Auth::check()) {
            \Log::info('User not authenticated, redirecting to login.');
            return redirect('login');
        }
    
        $user = Auth::user();

        if ($user->hasAnyRole($roles)) {
            return $next($request);
        }
    
        return redirect('dashboard')->with('error', 'You do not have access to this page.');
    }
    
    
}

