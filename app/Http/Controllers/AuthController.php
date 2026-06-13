<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the login page.
     * The page embeds <x-auth.login-form> and is also used as a
     * no-JS fallback when the modal cannot render.
     */
    public function showLogin()
    {
        // If a real auth layer is added later, redirect already-authenticated
        // users away from this page:
        //   if (auth()->check()) return redirect()->route('featured.index');

        return view('auth.login');
    }

    /**
     * Handle login form submission.
     *
     * ── TEMPORARY (frontend-only) ────────────────────────────────────────────
     * Real authentication is not yet implemented.
     * Any non-empty email + password combination succeeds and redirects to
     * the Featured Jobs page. Replace this method body when integrating
     * Laravel Breeze / Sanctum / Fortify.
     * ─────────────────────────────────────────────────────────────────────────
     */
    public function login(Request $request)
    {
        // Basic structural validation — field presence and format only.
        // Swap this for Auth::attempt() + session when adding real auth.
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ], [
            'email.required'    => 'Please enter your email address.',
            'email.email'       => 'Please enter a valid email address.',
            'password.required' => 'Please enter your password.',
            'password.min'      => 'Password must be at least 6 characters.',
        ]);

        // ── TODO: replace the block below with real auth ─────────────────
        // if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        //     return back()->withErrors(['email' => 'These credentials do not match our records.'])
        //                  ->withInput($request->only('email', 'remember'));
        // }
        // $request->session()->regenerate();
        // ──────────────────────────────────────────────────────────────────

        // Temporary success — redirect to Featured Jobs
        return redirect()->route('featured.index')
                         ->with('login_success', 'Welcome back! You are now logged in.');
    }

    /**
     * Show the forgot password page (stub — real email flow added later).
     */
    public function showForgot()
    {
        return view('auth.forgot-password');
    }

    /**
     * Log the user out.
     * Placeholder — extend when real session auth is wired up.
     */
    public function logout(Request $request)
    {
        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('home')
                         ->with('success', 'You have been logged out.');
    }
}
