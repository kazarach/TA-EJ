<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (auth()->attempt(['username' => $input['username'], 'password' => $input['password']])) {
                        /** @var \App\Models\User $user */
            $user = Auth::user();

            // Redirect based on user role
            if ($user->hasAnyRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasAnyRole('manager')) {
                return redirect()->route('manager.dashboard');
            } elseif ($user->hasAnyRole('user')) {
                return redirect()->route('user.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Unauthorized access.');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Username And Password Are Wrong.');
        }
    }
}
