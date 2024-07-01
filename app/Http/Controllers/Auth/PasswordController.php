<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
    public function resetPassword()
    {
        $user = auth()->user();

        $roles = explode(', ', $user->role);

        if (in_array('handler-admin', $roles) || in_array('agent-admin', $roles)) {
            return view('auth.admin-reset-password', compact('user'));
        } else if (in_array('handler-op', $roles) || in_array('agent-op', $roles)) {
            return view('auth.user-reset-password', compact('user'));
        } else if (in_array('prospect', $roles)) {
            return view('auth.prospect-reset-password', compact('user'));
        }

    }

    public function changePassword(Request $request)
    {
        $messages = [
            'old_password.required' => 'Veuillez fournir votre ancien mot de passe.',
            'new_password.required' => 'Veuillez fournir votre nouveau mot de passe.',
            'new_password_confirmation.required' => 'Veuillez fournir votre mot de passe de confirmation',
            'new_password.confirmed' => 'La confirmation du nouveau mot de passe ne correspond pas.',

        ];

        $request->validate([
            'old_password' => 'required',
            'new_password_confirmation' => 'required',
            'new_password' => 'required|confirmed',
        ], $messages);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'L\'ancien mot de passe est incorrect.'])->withInput();
        }

        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors(['new_password' => 'Le nouveau mot de passe doit être différent de l\'ancien mot de passe.'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('logout')->with('success', 'Le mot de passe a été changé avec succès.');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

}
