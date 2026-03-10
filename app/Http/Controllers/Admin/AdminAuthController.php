<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
  public function showLogin(): View|RedirectResponse
  {
    if (session('is_admin_authenticated')) {
      return redirect()->route('admin.dashboard');
    }

    return view('admin.auth.login');
  }

  public function login(LoginRequest $request): RedirectResponse
  {
    $request->authenticate();
    $request->session()->regenerate();

    return redirect()->route('admin.dashboard')->with('success', 'Welcome to the admin section.');
  }

  public function logout(Request $request): RedirectResponse
  {
    // $request->session()->forget('is_admin_authenticated');
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    // $request->session()->regenerateToken();

    return redirect()->route('login')->with('success', 'You are signed out.');
  }
}
