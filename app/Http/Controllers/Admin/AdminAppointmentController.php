<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminAppointmentController extends Controller
{
  public function index(): View
  {
    return view('admin.appointments.index', [
      'appointments' => Appointment::query()->latest()->paginate(20),
    ]);
  }

  public function destroy(Appointment $appointment): RedirectResponse
  {
    $appointment->delete();

    return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully.');
  }
}
