<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        $userRole = $user->role; // Assuming 'role' is the name of the column storing the user's role in the 'users' table

        // Redirect to the appropriate route based on user role
        if ($userRole === 'superadmin') {
            return redirect()->route('superadmin.test');
        } elseif ($userRole === 'admin') {
            return redirect()->route('admin.test');
        } elseif ($userRole == 'user') {
            return redirect()->route('user.test');
        } else {
            return redirect()->route('dashboard');
        }
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
