<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StreamsRsvp;
use Illuminate\View\View;

class AdminStreamsRsvpController extends Controller
{
  public function index(): View
  {
    return view('admin.stream-rsvps.index', [
      'rsvps' => StreamsRsvp::query()
        ->with('stream:id,couples_name,slug')
        ->latest()
        ->paginate(20),
    ]);
  }
}
