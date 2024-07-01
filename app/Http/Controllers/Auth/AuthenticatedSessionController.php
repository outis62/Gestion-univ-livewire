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
    protected $email = 'email';

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('login.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Get the authenticated user
        $user = $request->user();

        // Check the user's role and redirect accordingly
        if ($user->role == 'handler-admin') {
            return redirect('/admins/dashboard');
        } elseif ($user->role == 'handler-op') {
            return redirect('/cooperatives/dashboard');
        } elseif ($user->role == 'agent-admin') {
            // Redirigez vers le tableau de bord approprié pour 'handler_agent'
            return redirect('/admins/dashboard');
        } elseif ($user->role == 'agent-op') {
            // Redirigez vers le tableau de bord approprié pour 'agent_op'
            return redirect('/cooperatives/dashboard');
        } elseif ($user->role == 'prospect') {
            // Redirigez vers le tableau de bord approprié pour 'prospect'
            return redirect('/');
        } else {
            return redirect(RouteServiceProvider::HOME);
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
    // public function logout(Request $request)
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('login');
    // }
}
