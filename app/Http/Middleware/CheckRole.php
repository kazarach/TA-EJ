<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        Log::info('Middleware CheckRole triggered for request path: ' . $request->path());

        try {
            $user = JWTAuth::parseToken()->authenticate();
            Log::info('Authenticated user: ', ['user' => $user]);
        } catch (\Exception $e) {
            Log::error('User not authenticated or token invalid: ' . $e->getMessage());
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if ($user && $user->hasAnyRole($roles)) {
            return $next($request);
        }

        Log::warning('User does not have the required roles', ['user_roles' => $user->roles->pluck('name')->toArray(), 'required_roles' => $roles]);
        return redirect('dashboard')->with('error', 'You do not have access to this page.');
    }
}



