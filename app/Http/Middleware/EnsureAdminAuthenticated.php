<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminAuthenticated
{
  /**
   * Handle an incoming request.
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (! $request->session()->get('is_admin_authenticated', false)) {
      return redirect()->route('login')->with('error', 'Please sign in to access the admin section.');
    }

    return $next($request);
  }
}
