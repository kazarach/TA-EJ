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
    
        \Log::info('User ID: ' . $user->id);
        \Log::info('User Roles: ' . $user->roles()->pluck('name')->toJson());
        \Log::info('Roles being checked: ' . implode(', ', $roles));
    
        if ($user->hasAnyRole($roles)) {
            \Log::info('User has role, proceeding to next middleware/route.');
            return $next($request);
        }
    
        \Log::info('User does not have role, redirecting to production.');
        return redirect('production')->with('error', 'You do not have access to this page.');
    }
    
    
}

