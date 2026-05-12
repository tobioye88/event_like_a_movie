<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\GuestInviteController;
use App\Http\Controllers\StreamsController;
use App\Http\Controllers\StreamsRsvpController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserOccasionController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminStreamsController;
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\AdminOccasionController;
use App\Http\Controllers\Admin\AdminStreamsRsvpController;
use App\Http\Controllers\Admin\AdminUserController;

// Route::view('/email-template', 'mail.sample');

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/services', 'pages.services')->name('services');
Route::get('/streams', [StreamsController::class, 'index'])->name('streams');
Route::get('/streams/{stream:slug}', [StreamsController::class, 'show'])->name('streams.show');
Route::post('/streams/rsvp', [StreamsRsvpController::class, 'store'])->name('streams.rsvp.store');
Route::get('/invites/{occasion:slug}', [GuestInviteController::class, 'show'])->name('invites.show');
Route::post('/invites/{occasion:slug}/rsvp', [GuestInviteController::class, 'rsvp'])->name('invites.rsvp.store');

// submit appointment form
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
// submit rsvp

Route::middleware('auth')->group(function (): void {
  Route::get('/dashboard', UserDashboardController::class)->name('dashboard');
  Route::patch('/occasions/{occasion}/publish', [UserOccasionController::class, 'publish'])->name('occasions.publish');
  Route::resource('occasions', UserOccasionController::class);
  Route::get('/account', [UserAccountController::class, 'edit'])->name('account.edit');
  Route::delete('/account', [UserAccountController::class, 'destroy'])->name('account.destroy');
});

Route::prefix('admin')->name('admin.')->group(function (): void {
  Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
  });

  Route::middleware(['auth', 'admin'])->group(function (): void {
    Route::get('/', AdminDashboardController::class)->name('dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::resource('streams', AdminStreamsController::class)->except(['show']);
    Route::resource('users', AdminUserController::class)->except(['destroy']);
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::delete('/occasions/{occasion}/images/{image}', [AdminOccasionController::class, 'destroyImage'])
      ->whereIn('image', ['background', 'side'])
      ->name('occasions.images.destroy');
    Route::resource('occasions', AdminOccasionController::class)->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);

    Route::get('/stream-rsvps', [AdminStreamsRsvpController::class, 'index'])
      ->name('stream-rsvps.index');

    Route::get('/appointments', [AdminAppointmentController::class, 'index'])
      ->name('appointments.index');
    Route::delete('/appointments/{appointment}', [AdminAppointmentController::class, 'destroy'])
      ->name('appointments.destroy');
  });
});

require __DIR__ . '/auth.php';
