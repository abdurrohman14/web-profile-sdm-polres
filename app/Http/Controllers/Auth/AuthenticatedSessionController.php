<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

        // Ambil role pengguna yang telah login
        $role = auth()->user()->role;

        // Redirect sesuai dengan peran pengguna menggunakan if-else
        if ($role === 'admin') {
            return redirect()->intended(route('admin', [], false));
        } elseif ($role === 'superadmin') {
            return redirect()->intended(route('superadmin', [], false));
        } elseif ($role === 'personil') {
            return redirect()->intended(route('personil', [], false));
        } else {
            return redirect()->intended(route('dashboard', [], false));
        }

        // return redirect()->intended(route('dashboard', absolute: false));
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