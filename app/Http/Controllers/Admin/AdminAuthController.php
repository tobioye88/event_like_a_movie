<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
  public function showLogin(): View|RedirectResponse
  {
    if (auth()->check() && auth()->user()->isAdmin()) {
      return redirect()->route('admin.dashboard');
    }

    return view('admin.auth.login');
  }

  public function login(LoginRequest $request): RedirectResponse
  {
    $request->authenticate();

    if (! $request->user()?->isAdmin()) {
      Auth::guard('web')->logout();

      throw ValidationException::withMessages([
        'email' => 'This account does not have admin access.',
      ]);
    }

    $request->session()->regenerate();

    return redirect()->route('admin.dashboard')->with('success', 'Welcome to the admin section.');
  }

  public function logout(Request $request): RedirectResponse
  {
    // $request->session()->forget('is_admin_authenticated');
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login')->with('success', 'You are signed out.');
  }
}
