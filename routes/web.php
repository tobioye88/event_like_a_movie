<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\StreamsController;
use App\Http\Controllers\StreamsRsvpController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminStreamsController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\AdminStreamsRsvpController;

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/services', 'pages.services')->name('services');
Route::get('/streams', [StreamsController::class, 'index'])->name('streams');
Route::get('/streams/{stream:slug}', [StreamsController::class, 'show'])->name('streams.show');
Route::post('/streams/rsvp', [StreamsRsvpController::class, 'store'])->name('streams.rsvp.store');

// submit appointment form
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
// submit rsvp

Route::prefix('admin')->name('admin.')->group(function (): void {
  Route::middleware('auth')->group(function (): void {
    Route::get('/', AdminDashboardController::class)->name('dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::resource('streams', AdminStreamsController::class)->except(['show']);

    Route::get('/stream-rsvps', [AdminStreamsRsvpController::class, 'index'])
      ->name('stream-rsvps.index');

    Route::get('/appointments', [AdminAppointmentController::class, 'index'])
      ->name('appointments.index');
    Route::delete('/appointments/{appointment}', [AdminAppointmentController::class, 'destroy'])
      ->name('appointments.destroy');
  });
});

require __DIR__ . '/auth.php';
