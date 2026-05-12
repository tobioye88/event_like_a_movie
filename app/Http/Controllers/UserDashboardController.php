<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserDashboardController extends Controller
{
    public function __invoke(): View
    {
        $occasions = auth()->user()
            ->occasions()
            ->withCount('rsvps')
            ->latest('event_at')
            ->take(6)
            ->get();

        return view('user.dashboard.index', [
            'occasions' => $occasions,
        ]);
    }
}
