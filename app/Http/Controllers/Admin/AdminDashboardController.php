<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Occasion;
use App\Models\Streams;
use App\Models\StreamsRsvp;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
  public function __invoke(): View
  {
    return view('admin.dashboard', [
      'streamsCount' => Streams::count(),
      'appointmentsCount' => Appointment::count(),
      'streamRsvpsCount' => StreamsRsvp::count(),
      'usersCount' => User::count(),
      'occasionsCount' => Occasion::count(),
    ]);
  }
}
