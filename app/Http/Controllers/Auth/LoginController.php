<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/dashboard';

    // public function __construct()
    // {
    //     $this->middleware('auth:api')->except('logout','login');
    // }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('username', 'password');
    
    //     if (!$token = auth()->attempt($credentials)) {
    //         return redirect()->route('login');
    //     }

    //     \Log::info('Generated Token: ' . $token);

    //     $user = auth()->user();
    
    //     if ($request->expectsJson()) {
    //         // For API login, respond with JSON
    //         if ($user->hasAnyRole('admin')) {
    //             return $this->respondWithToken($token, 'admin.dashboard');
    //         } elseif ($user->hasAnyRole('manager')) {
    //             return $this->respondWithToken($token, 'manager.dashboard');
    //         } elseif ($user->hasAnyRole('user')) {
    //             return $this->respondWithToken($token, 'user.dashboard');
    //         } else {
    //             auth()->logout();
    //             return response()->json(['error' => 'Unauthorized access.'], 401);
    //         }
    //     } else {
    //         // For web login, redirect based on role
    //         if ($user->hasAnyRole('admin')) {
    //             return redirect()->route('admin.dashboard')->with('token', $token);
    //         } elseif ($user->hasAnyRole('manager')) {
    //             return redirect()->route('manager.dashboard')->with('token', $token);
    //         } elseif ($user->hasAnyRole('user')) {
    //             return redirect()->route('user.dashboard')->with('token', $token);
    //         } else {
    //             auth()->logout();
    //             return redirect()->route('login')->with('error', 'Unauthorized access.');
    //         }
    //     }
    // }
    
    
    // protected function respondWithToken($token, $dashboardRouteName)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => JWTAuth::factory()->getTTL() * 60,
    //         'redirect_to' => route($dashboardRouteName),
    //         'user' => $user
    //     ]);
    // }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect()->route('login');
    // }

    // public function refresh()
    // {
    //     return $this->respondWithToken(auth()->refresh());
    // }

}
