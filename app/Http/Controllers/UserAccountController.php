<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class UserAccountController extends Controller
{
    public function edit(): View
    {
        return view('user.account.edit');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if ($user->isAdmin()) {
            throw ValidationException::withMessages([
                'password' => 'Admin accounts cannot be deleted from the user account page.',
            ]);
        }

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return redirect()->route('home')->with('success', 'Your account has been deleted.');
    }
}
